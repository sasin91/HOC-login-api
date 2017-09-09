<?php

namespace App\Http\Middleware;

use App\SuperUser;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;

class IsSuperUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (SuperUser::has($request->user())) {
			return $next($request);
		}

		throw new UnauthorizedException("Area 51. Access denied.", Response::HTTP_FORBIDDEN);
	}
}
