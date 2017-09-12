<?php

namespace App\Listeners;

use App\EmailVerification;
use Illuminate\Auth\Events\Registered;

class SendEmailVerification
{
	/**
	 * Handle the event.
	 *
	 * @param  \Illuminate\Auth\Events\Registered $event
	 * @return void
	 */
	public function handle(Registered $event)
	{
		EmailVerification::notify($event->user);
	}
}
