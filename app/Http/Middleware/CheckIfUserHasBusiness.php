<?php

namespace App\Http\Middleware;

use App\Models\Business;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserHasBusiness
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		if (Auth::check()) {
			$user = Auth::user();

			$existingBusiness = Business::where('user_id', $user->id)->first();

			if ($existingBusiness) {
				return redirect()->route('dashboard');
			}
		}

		return $next($request);
	}
}
