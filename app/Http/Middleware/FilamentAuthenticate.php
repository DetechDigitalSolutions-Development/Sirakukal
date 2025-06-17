<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilamentAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        $panel = Filament::getCurrentPanel();
        
        // Skip authentication for login page
        if ($request->routeIs("filament.{$panel->getId()}.auth.login")) {
            return $next($request);
        }

        // Handle unauthenticated users
        if (!Filament::auth()->check()) {
            // Store intended URL for post-login redirect
            session()->put('url.intended', $request->fullUrl());
            
            // Explicit redirect to login with panel context
            return redirect()->route("filament.{$panel->getId()}.auth.login");
        }

        // Handle authenticated users
        return $next($request);
    }
}