<?php

namespace App\Providers;

use App\Events\CreatedPurchase;
use App\Events\ThreadReceivedNewReply;
use App\Listeners\GeneratePurchaseToken;
use App\Listeners\NotifyMentionedUsers;
use App\Listeners\NotifySubscribers;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		ThreadReceivedNewReply::class => [
			NotifyMentionedUsers::class,
			NotifySubscribers::class
		],

		CreatedPurchase::class => [
			GeneratePurchaseToken::class
		]
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		//
	}
}
