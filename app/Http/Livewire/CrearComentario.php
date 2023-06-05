<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CrearComentario extends Component{

    public $post;
    public $comentario;
    public $mensaje;

    protected $rules = [
        'comentario' => 'required|max:255'
    ];

    public function crearComentario(Post $post){
        $this->validate();

        $this->post->comentarios()->create([
            'comentario' => $this->comentario,
            'user_id' => auth()->user()->id,
        ]);

        $this->emit('actualizarComentarios');

        $this->comentario = '';
        $this->mensaje = 'Se agregó el comentario correctamente';
    }

    public function render(){
        return view('livewire.crear-comentario');
    }
}
