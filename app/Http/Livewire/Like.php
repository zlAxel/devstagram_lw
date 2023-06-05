<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Like extends Component{

    public $likes = 0;
    public $checkLike;
    public $post;

    public function mount(){
        if( auth()->check() ){
            if( !$this->post->checkLike(auth()->user()) ){            
                $this->checkLike = false;
            }else{
                $this->checkLike = true;
            }
        }

        $this->likes = $this->post->likes->count();
    }

    public function storeLike(){
        if( $this->post->checkLike(auth()->user()) ){
            auth()->user()->likes()->where('post_id', $this->post->id)->delete();
            
            $this->checkLike = false;
            $this->likes--;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);

            $this->checkLike = true;
            $this->likes++;
        }
    }

    public function render(){
        return view('livewire.like');
    }
}
