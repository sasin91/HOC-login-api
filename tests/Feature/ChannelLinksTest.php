<?php

namespace Tests\Feature;

use App\Channel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\Feature\AssertsModelLink;
use Tests\TestCase;

class ChannelLinksTest extends TestCase
{
	use AssertsModelLink;

	/** @test */
	function a_serialized_channel_contains_links_to_self_and_related() 
	{
		$channel = factory(Channel::class)->create();

		$this->assertArrayHasKey('links', $channel, "Channel does not have any links.");

		$this->assertValidLink('self', $channel);
		$this->assertValidLink('threads', $channel);
		$this->assertValidLink('creator', $channel);
		$this->assertValidLink('board', $channel);
	}
}
