<?php

namespace Tests\Feature;

use App\Board;
use App\Jobs\ScrapOldPhoto;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BoardCoverTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		Storage::fake('public');

		Bus::fake();
	}

	/** @test */
	function admin_can_upload_a_board_cover() 
	{
		$board = factory(Board::class)->create();

		$this->signInAsAdmin();

		$this->post(route('board.cover.store', $board), ['photo' => $file = UploadedFile::fake()->image('photo.jpg')])
			 ->assertSuccessful();	

		$this->assertWasUploaded($file, $board);
	} 

	/** @test */
	function creator_can_upload_a_board_cover() 
	{
		$board = factory(Board::class)->create();

		$this->signIn($board->creator);

		$this->post(
			route('board.cover.store', $board), 
			['photo' => $file = UploadedFile::fake()->image('photo.jpg')]
		)->assertSuccessful();	

		$this->assertWasUploaded($file, $board);
	}

	/** @test */
	function it_scraps_the_old_when_a_new_is_uploaded() 
	{
		$board = factory(Board::class)->create(['photo_path' => 'fake-photo.png']);

		$this->signIn($board->creator);

		$this->post(
			route('board.cover.store', $board), 
			['photo' => $file = UploadedFile::fake()->image('photo.jpg')]
		)->assertSuccessful();

		$this->assertWasUploaded($file, $board);

		Bus::assertDispatched(ScrapOldPhoto::class, function ($job) use($board) {
			$job->handle();

			return true;
		});

		Storage::disk('public')->assertMissing('boards/' . $board->getOriginal('photo_path'));
	} 

	/** @test */
	function it_reverts_to_default_when_deleted() 
	{
		$board = factory(Board::class)->create(['photo_path' => 'fake-photo.png']);

		$this->signIn($board->creator);

		$this->delete(route('board.cover.destroy', $board))->assertSuccessful();

		Bus::assertDispatched(ScrapOldPhoto::class);

		$this->assertEquals($board->defaultPhotoUrl(), $board->fresh()->photo_url);
	} 

	/** @test */
	function a_visitor_cannot_change_a_cover_photo() 
	{
		$this->enableExceptionHandling();

		$board = factory(Board::class)->create();

		$this->post(route('board.cover.store', $board))->assertRedirect('/api/login');
	} 

	/** @test */
	function a_visitor_cannot_remove_a_cover_photo() 
	{
		$this->enableExceptionHandling();

		$board = factory(Board::class)->create();

		$this->delete(route('board.cover.destroy', $board))->assertRedirect('/api/login');
	} 

	/** @test */
	function a_random_user_cannot_change_a_cover_photo() 
	{
		$this->enableExceptionHandling();

		$board = factory(Board::class)->create();

		$this->signIn();

		$this->post(route('board.cover.store', $board))->assertStatus(403);
	} 

	/** @test */
	function a_random_user_cannot_remove_a_cover_photo() 
	{
		$this->enableExceptionHandling();

		$board = factory(Board::class)->create();

		$this->signIn();

		$this->delete(route('board.cover.store', $board))->assertStatus(403);
	} 

	private function assertWasUploaded($file, $board)
	{
		Storage::disk('public')->assertExists('boards/' . $file->hashName());

		$this->assertDatabaseHas('boards', [
			'id' => $board->id,
			'photo_path' => 'boards/' . $file->hashName()
		]);
	}
}
