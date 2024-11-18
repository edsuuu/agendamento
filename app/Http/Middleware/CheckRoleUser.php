<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
	 */
	public function handle(Request $request, Closure $next, $role): Response
	{
		if (Auth::check()) {
			$user = Auth::user();
			$userRole = strtolower(trim($user->role));
			
			if ($userRole === $role) {
				return $next($request);
			} else {
				return redirect()->route('home');
			}
		}
		
		return redirect()->route('login');
	}
}
