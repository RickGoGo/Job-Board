<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() === null) {
            return redirect()->route('login')->with('fail', 'Please login.');
        }

        if ($request->user()->employer === null) {
            return redirect()->route('employers.create')->with('fail', 'Please register as an employer first');
        }
        return $next($request);
    }
}
