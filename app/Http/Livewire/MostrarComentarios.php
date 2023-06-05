<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarComentarios extends Component{

    public $post;

    protected $listeners = ['actualizarComentarios'];

    public function actualizarComentarios(){
        $this->post->refresh(); 
        $this->comentarios = $this->post->comentarios; 
        $this->emit('$refresh'); 
    }

    public function render(){

        $comentarios = $this->post->comentarios;
        
        return view('livewire.mostrar-comentarios', compact('comentarios'));
    }
}
