<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CanAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->redirectToRoute('login')->with('warning', 'You are not logged in.');
        }

        if ($role === $user->type) {
            return $next($request);
        }

        return redirect()->back()->with('warning', 'You cannot access the requested resource');
    }
}
