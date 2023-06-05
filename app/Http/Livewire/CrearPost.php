<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;

class CrearPost extends Component{

    public $titulo; 
    public $descripcion; 
    public $imagen; 

    protected $listeners = [
        'actualizarImagen',
        'eliminarImagen',
    ];

    protected $rules = [
        'titulo' => 'required|max:255',
        'imagen' => 'required|min:40|max:40',
    ];

    public function actualizarImagen($nombreImg){
        $this->imagen = $nombreImg;
    }

    public function eliminarImagen($nombreImg){
        $pathImagen = public_path('uploads') . "/" . $nombreImg;

        if(File::exists($pathImagen)){
            unlink($pathImagen);
        }
    }

    public function crearPost(){
        $this->validate();

        // Post::create([
        //     'titulo' => $this->titulo,
        //     'descripcion' => $this->descripcion,
        //     'imagen' => $this->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);

        $postname = Str::random(10);

        auth()->user()->posts()->create([
            'postname' => $postname,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
        ]);

        return redirect()->route('posts.profile', auth()->user()->username);
    }

    public function render(){
        return view('livewire.crear-post');
    }
}
