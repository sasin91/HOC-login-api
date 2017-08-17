<?php

namespace Tests\Feature;

use App\Channel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ChannelCoverTest extends TestCase
{
	/** @test */
	function admin_can_upload_a_channel_conver() 
	{
		$channel = factory(Channel::class)->create();

		$this->signInAsAdmin();

		Storage::fake('public');

		$this->post(route('channel.cover.store'), ['photo' => $file = UploadedFile::fake()->image('photo.jpg')])
			 ->assertSuccessful();	

		$this->assertWasUploaded($file, $channel);
	} 

	/** @test */
	function creator_can_upload_a_channel_cover() 
	{
		$channel = factory(Channel::class)->create();

		$this->signIn($channel->creator);

		Storage::fake('public');

		$this->post(route('channel.cover.store'), ['photo' => $file = UploadedFile::fake()->image('photo.jpg')])
			 ->assertSuccessful();	

		$this->assertWasUploaded($file, $channel);
	}

	/** @test */
	function creator_can_update_channel_cover() 
	{
		$this->fail('TODO');
	} 

	/** @test */
	function admin_can_update_channel_cover() 
	{
		$this->fail('TODO');
	} 

	/** @test */
	function visitor_cannot_upload_a_channel_photo() 
	{
		$this->fail('TODO');
	} 

	/** @test */
	function it_reverts_to_default_when_deleted() 
	{
		$this->fail('TODO');
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
