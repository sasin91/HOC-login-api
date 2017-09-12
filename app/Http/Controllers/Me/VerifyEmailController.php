<?php

namespace App\Http\Controllers\Me;

use App\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifyEmailController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	public function show(Request $request)
	{
		if (is_null($request->user()->verified_at)) {
			$valid = EmailVerification::check($request->token, $request->user());

			throw_unless($valid, \InvalidArgumentException::class, "Invalid verification token.");

			$request->user()->update(['verified_at' => now()]);
		}

		return response('', Response::HTTP_NO_CONTENT);
	}
}
