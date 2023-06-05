<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;

class LoginUsuario extends Component{

    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|email|exists:users',
        'password' => 'required',
    ];

    protected $messages = [
        'email.exists' => 'El correo electrónico ingresado no encuentra registrado.',
    ];

    public function loginUsuario(){

        $this->validate();

        if(!auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)){
            return back()->with('verifyUser', 'El correo o la contraseña escritas son incorrectas.');
        }

        $previousUrl = request()->cookie('previous_url');
        // $routeName = \Illuminate\Support\Facades\Route::currentRouteName();

        // dump(Str::startsWith(Route::getCurrentRoute()->getActionName(), 'Livewire'));

        // if(empty($previousUrl) or $routeName == "livewire.message") {
        // if(empty($previousUrl) or Str::startsWith(Route::getCurrentRoute()->getActionName(), 'Livewire')) {
        if(empty($previousUrl)) {
            return redirect()->route('posts.profile', auth()->user());
        }

        return redirect($previousUrl);
    }

    public function render(){
        return view('livewire.login-usuario');
    }
}
