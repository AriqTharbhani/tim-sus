<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->status === 1) {
                return $next($request);
            } else {
                return redirect('/unauthorized');
            }
        } else {
            return redirect('/');
        }
    }
}