<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrainerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('api')->check() && auth('api')->user()->role === 'trainer') {
            if (auth('api')->user()->status === 'inactive') {
                return response()->json(['error' => 'Your account is inactive.'], Response::HTTP_FORBIDDEN);
            }
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized action.'], Response::HTTP_FORBIDDEN);
    }
}
