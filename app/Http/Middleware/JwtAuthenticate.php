<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = $request->cookie('jwt_token') ?? $request->bearerToken();

            if (!$token) {
                return redirect()->route('login');
            }

            $user = JWTAuth::setToken($token)->authenticate();
            if (!$user) {
                return redirect()->route('login');
            }

            Auth::setUser($user);
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
