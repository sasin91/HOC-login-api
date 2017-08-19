<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ThreadLinksTest extends TestCase
{
	use DatabaseMigrations, AssertsModelLink;

	/** @test */
	function a_serialized_thread_contains_links_to_self_and_related() 
	{
		//User::disableSearchSyncing();
		//Thread::disableSearchSyncing();

		$thread = factory(Thread::class)->create();

		$this->assertArrayHasKey('links', $thread, "Thread does not have any links.");

		$this->assertValidLink('self', $thread);
		$this->assertValidLink('creator', $thread);
		$this->assertValidLink('channel', $thread);
		$this->assertValidLink('replies', $thread);
		$this->assertValidLink('subscribe', $thread);
		$this->assertValidLink('unsubscribe', $thread);
	}
}
