<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller{

    public function __construct(){
        $this->middleware('auth')->except('show', 'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('posts.create');
    }

    /**
     * Guardamos la pura imagen.
     */
    public function store(Request $request){
        $imagen = $request->file('file');

        $nombreImg = Str::uuid() . '.' . $imagen->extension();
        $imagenPath = public_path('uploads') . "/" . $nombreImg;

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);
        
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImg ]);
    }

    /**
     * Display the specified resource.
     */
    public function profile(User $user){
        // $user = $user->toArray();
        $posts = $user->posts()->latest()->paginate(8);
        // $posts = $user->posts()->simplePaginate(4);
        // $user = json_decode(json_encode($user->toArray()));

        $context = [
            'posts' => $posts,
            'user' => $user,
        ];

        return view('posts.profile', $context);
    }

    public function show(Post $post){
        // $post = $user->posts()->where('postname', $post->postname)->firstOrFail();
        // $user = json_decode(json_encode($user->toArray()));

        // $context = [
        //     'user' => $user,
        //     'post' => $post,
        // ];

        // session(['previous_url' => url()->previous()]);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
        $this->authorize('delete', $post);

        $imagenPath = public_path('uploads' . "/" . $post->imagen);

        if(File::exists($imagenPath)){
            unlink($imagenPath);
        }
        
        $post->delete();

        return redirect()->route('posts.profile', auth()->user()->username);
        
    }
}
