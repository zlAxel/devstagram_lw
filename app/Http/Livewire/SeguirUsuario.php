<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeguirUsuario extends Component{

    public $user;
    public $posts;

    public $followers = 0;
    public $follows = 0;
    public $checkFollow;

    public function mount(){
        $this->followers = $this->user->followers()->count();
        $this->follows = $this->user->follows()->count();
        $this->checkFollow = $this->user->checkFollow( auth()->id() );
    }

    public function follow(){
        $this->user->followers()->attach( auth()->id() );
        $this->followers = $this->user->followers()->count();
        $this->checkFollow = true;
    }
    
    public function unfollow(){
        $this->user->followers()->detach( auth()->id() );
        $this->followers = $this->user->followers()->count();
        $this->checkFollow = false;
    }

    public function render(){

        $this->posts = $this->user->posts()->count();

        return view('livewire.seguir-usuario');
    }
}
