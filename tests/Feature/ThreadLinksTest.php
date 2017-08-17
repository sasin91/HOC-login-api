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
	use DatabaseMigrations;

	/** @test */
	function a_serialized_thread_contains_links_to_self_and_related() 
	{
		User::disableSearchSyncing();
		Thread::disableSearchSyncing();

		$thread = factory(Thread::class)->create();

		$this->assertArrayHasKey('links', $thread, "Thread does not have any links.");

		$this->assertValidLink('self', $thread);
		$this->assertValidLink('creator', $thread);
		$this->assertValidLink('channel', $thread);
		$this->assertValidLink('replies', $thread);
		$this->assertValidLink('subscribe', $thread);
		$this->assertValidLink('unsubscribe', $thread);
	}

	protected function assertValidLink($link, $thread)
	{
		$thread = is_array($thread) ? $thread : $thread->toArray();

		$this->assertArrayHasKey($link, $thread['links'], "Thread did not contain link [{$link}].");
		$this->assertNotEmpty($thread['links'][$link], "Thread did contain link [{$link}], but it has no url value.");

		$this->assertNotFalse(filter_var($thread['links'][$link], FILTER_VALIDATE_URL), "[{$thread['links'][$link]}] is not a valid URL.");
	}
}
