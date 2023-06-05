<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request){
        
        $ids = auth()->user()->follows->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(8);

        return view('home', compact('posts'));

    }
}
