<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();

        if ($user && $user->hasRole($roles)) {
            return $next($request);
        }

        return redirect('login');
    }
}
