<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SavePreviousUrl{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{

        if ( !$request->routeIs('logout') && auth()->check() && !Str::startsWith(Route::getCurrentRoute()->getActionName(), 'Livewire') ) {
        // if (!$request->routeIs(['register', 'login', 'logout'])) {
            $previousUrl = url()->current();
            $previousCookieUrl = Cookie::get('previous_url');

            if ($previousUrl != $previousCookieUrl) {
                session(['previous_url' => $previousUrl]);
                return $next($request)->withCookie(cookie('previous_url', $previousUrl));
            }
        }
        
        return $next($request);
    }
}
