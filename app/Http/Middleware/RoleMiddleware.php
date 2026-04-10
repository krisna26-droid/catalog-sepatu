<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user() || $request->user()->role !== $role) {
            
            // Redirect ke dashboard user biasa dengan pesan error
            return redirect()->route('dashboard')->with('error', 'Akses Terbatas: Anda bukan Admin.');
        }
        
        return $next($request);
    }
}
