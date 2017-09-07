<?php

namespace App\Http\Controllers;

use App\Thread;

class UnlockThreadController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	public function update(Thread $thread)
	{
		$this->authorize('update', $thread);

		return tap($thread)->update([
			'locked_by' => null,
			'locked_at' => null
		]);
	}
}
