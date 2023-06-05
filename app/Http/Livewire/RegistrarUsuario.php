<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class RegistrarUsuario extends Component{

    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|max:30',
        'username' => 'required|unique:users|min:3|max:20',
        'email' => 'required|email|unique:users|max:60',
        'password' => 'required|confirmed|min:6',
        // 'password_confirmation' => 'required',
    ];

    public function registrarUsuario(){

        $this->username = Str::slug($this->username);

        $this->validate();

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Autenticar al usuario

        auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        // Crear mensaje de la creación

        // session()->flash('mensaje', 'Te has registrado correctamente, ahora puedes iniciar sesión.');

        // Redireccionar al usuario

        return redirect()->route('posts.profile');
        
    }

    public function render(){
        return view('livewire.registrar-usuario');
    }
}
