<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MostrarPosts extends Component{

    public $posts;
    public $titulo;

    /**
     * Create a new component instance.
     */
    public function __construct($posts, $titulo){
        $this->posts = $posts;
        $this->titulo = $titulo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string{
        return view('components.mostrar-posts');
    }
}
