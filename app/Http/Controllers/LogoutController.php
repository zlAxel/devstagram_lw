<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request){

        auth()->logout();
        return redirect()->route('login')->withCookie(Cookie::forget('previous_url'));
        
    }
}
