<?php

namespace App\Listeners;

use App\Events\CreatedPurchase;
use Hashids\Hashids;
use Hashids\HashidsInterface;

class GeneratePurchaseToken
{
	/**
	 * @var Hashids
	 */
	protected $hashids;

	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct(HashidsInterface $hashids)
	{
		$this->hashids = $hashids;
	}

	/**
	 * Handle the event.
	 *
	 * @param  CreatedPurchase $event
	 * @return void
	 */
	public function handle(CreatedPurchase $event)
	{
		$token = (!app()->environment('production'))
			? $this->dummyToken()
			: $this->realToken($event->purchase);

		$event->purchase
			->forceFill(['token' => $token])
			->saveOrFail();
	}

	private function dummyToken()
	{
		return str_random();
	}

	private function realToken($purchase)
	{
		return $this->hashids->encode($purchase->getKey());
	}
}
