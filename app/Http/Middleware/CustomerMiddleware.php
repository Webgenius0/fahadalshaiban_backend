<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('api')->check() && auth('api')->user()->role === 'customer') {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized action.'], 403);
    }
}
