<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $decodedToken = base64_decode($token);

        $user = User::query()->where('name', $decodedToken)->first();

        if (is_null($user)) {
            return response()->json([
                'message' => 'Token is invalid!',
                'errors' => [
                    'token' => 'Token is invalid'
                ]
            ], 401);
        }

        return $next($request);
    }
}
