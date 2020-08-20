<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware extends Middleware {

	public function handle($request, Closure $next, ...$guards){
		if (Auth::guard('api')->guest()) {
				
		return response()->json([
			'status' => false,
			'data' => 'Unauthorized'
		]);
		} else {
			return $next($request);
		}
	}

}
