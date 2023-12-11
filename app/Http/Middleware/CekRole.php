<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Yeah
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/login');
    }
}
