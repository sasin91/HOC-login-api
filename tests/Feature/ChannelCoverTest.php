<?php

namespace Tests\Feature;

use App\Channel;
use App\Jobs\ScrapOldPhoto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ChannelCoverTest extends TestCase
{
	protected function setUp()
	{
		parent::setUp();

		Storage::fake('public');

		Bus::fake();
	}

	/** @test */
	function admin_can_upload_a_channel_conver() 
	{
		$channel = factory(Channel::class)->create();

		$this->signInAsAdmin();

		$this->post(route('channel.cover.store', $channel), ['photo' => $file = UploadedFile::fake()->image('photo.jpg')])
			 ->assertSuccessful();	

		$this->assertWasUploaded($file, $channel);
	} 

	/** @test */
	function creator_can_upload_a_channel_cover() 
	{
		$channel = factory(Channel::class)->create();

		$this->signIn($channel->creator);

		$this->post(
			route('channel.cover.store', $channel), 
			['photo' => $file = UploadedFile::fake()->image('photo.jpg')]
		)->assertSuccessful();	

		$this->assertWasUploaded($file, $channel);
	}

	/** @test */
	function it_scraps_the_old_when_a_new_is_uploaded() 
	{
		$channel = factory(Channel::class)->create(['photo_path' => 'fake-photo.png']);

		$this->signIn($channel->creator);

		$this->post(
			route('channel.cover.store', $channel), 
			['photo' => $file = UploadedFile::fake()->image('photo.jpg')]
		)->assertSuccessful();

		$this->assertWasUploaded($file, $channel);

		Bus::assertDispatched(ScrapOldPhoto::class, function ($job) use($channel) {
			$job->handle();

			return true;
		});

		Storage::disk('public')->assertMissing('channels/' . $channel->getOriginal('photo_path'));
	} 

	/** @test */
	function it_reverts_to_default_when_deleted() 
	{
		$channel = factory(Channel::class)->create(['photo_path' => 'fake-photo.png']);

		$this->signIn($channel->creator);

		$this->delete(route('channel.cover.destroy', $channel))->assertSuccessful();

		Bus::assertDispatched(ScrapOldPhoto::class);

		$this->assertEquals($channel->defaultPhotoUrl(), $channel->fresh()->photo_url);
	} 

	/** @test */
	function a_visitor_cannot_change_a_cover_photo() 
	{
		$channel = factory(Channel::class)->create();

		$this->post(route('channel.cover.store', $channel))->assertRedirect('/api/login');
	} 

	/** @test */
	function a_visitor_cannot_remove_a_cover_photo() 
	{
		$channel = factory(Channel::class)->create();

		$this->delete(route('channel.cover.destroy', $channel))->assertRedirect('/api/login');
	} 

	/** @test */
	function a_random_user_cannot_change_a_cover_photo() 
	{
		$channel = factory(Channel::class)->create();

		$this->signIn();

		$this->post(route('channel.cover.store', $channel))->assertStatus(403);
	} 

	/** @test */
	function a_random_user_cannot_remove_a_cover_photo() 
	{
		$channel = factory(Channel::class)->create();

		$this->signIn();

		$this->delete(route('channel.cover.store', $channel))->assertStatus(403);
	} 

	private function assertWasUploaded($file, $channel)
	{
		Storage::disk('public')->assertExists('channels/' . $file->hashName());

		$this->assertDatabaseHas('channels', [
			'id' => $channel->id,
			'photo_path' => 'channels/' . $file->hashName()
		]);
	}
}
