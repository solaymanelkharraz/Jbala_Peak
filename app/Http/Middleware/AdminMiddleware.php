<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Don't forget this import!
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // 1. Check if user is NOT logged in
        if (!$user) {
            return redirect()->route('login');
        }

        // 2. Check if user is NOT an Admin
        if ($user->role !== User::ADMIN_ROLE) {
            return redirect()->route('login'); // Or redirect to home ('/')
        }

        // If they pass both checks, let them in!
        return $next($request);
    }
}