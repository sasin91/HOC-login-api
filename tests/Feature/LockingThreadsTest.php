<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LockingThreadsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function creator_can_lock_a_thread()
	{
		$thread = create(Thread::class);

		$this->signIn($thread->creator);

		$this->json('PUT', route('thread.lock', $thread))
			->assertSuccessful();

		$this->assertDatabaseHas($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => now(),
			'locked_by' => $thread->creator->id
		]);
	}

	/** @test */
	public function authenticated_user_cannot_lock_threads_they_do_not_own()
	{
		$this->enableExceptionHandling();

		$thread = create(Thread::class);

		$this->signIn();

		$this->json('PUT', route('thread.lock', $thread))
			->assertStatus(Response::HTTP_FORBIDDEN);

		$this->assertDatabaseMissing($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => now()
		]);
	}

	/** @test */
	public function moderators_can_lock_threads_they_do_not_own()
	{
		$thread = create(Thread::class);

		$this->signInAsModerator();

		$this->json('PUT', route('thread.lock', $thread))
			->assertSuccessful();

		$this->assertDatabaseHas($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => now(),
			'locked_by' => auth()->id()
		]);
	}

	/** @test */
	public function moderator_can_unlock_a_thread_they_do_not_own()
	{
		$thread = factory(Thread::class)->states('locked')->create();

		$this->signInAsModerator();

		$this->json('PATCH', route('thread.unlock', $thread))
			->assertSuccessful();

		$this->assertDatabaseHas($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => null,
			'locked_by' => null
		]);
	}

	/** @test */
	public function creator_can_unlock_a_thread_they_locked()
	{
		$thread = factory(Thread::class)->states('locked')->create();

		$this->signIn($thread->creator);

		$this->json('PATCH', route('thread.unlock', $thread))
			->assertSuccessful();

		$this->assertDatabaseHas($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => null,
			'locked_by' => null
		]);
	}

	/** @test */
	public function creator_cannot_unlock_a_thread_locked_by_somebody_else()
	{
		$this->enableExceptionHandling();

		$thread = factory(Thread::class)->states('locked')->create(['locked_by' => 999]);

		$this->signIn($thread->creator);

		$this->json('PATCH', route('thread.unlock', $thread))
			->assertStatus(403);

		$this->assertDatabaseHas($thread->getTable(), [
			'id' => $thread->id,
			'locked_at' => now()->format('Y-m-d H:i:s'),
			'locked_by' => "999"
		]);
	}
}
