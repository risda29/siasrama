<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    public function handle(Request $request, Closure $next, $level)
    {
        if (auth()->check() && auth()->user()->level === $level) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}