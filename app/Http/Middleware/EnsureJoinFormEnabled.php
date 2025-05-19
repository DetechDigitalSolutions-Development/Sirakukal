<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJoinFormEnabled
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!is_join_form_enabled()) {
            // Choose one:
            //return redirect('/');
            // or: abort(404);
            abort(403, 'Volunteer form is currently disabled');
        }

        return $next($request);
    }
}