<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarPerfil extends Component{

    use WithFileUploads;

    public $username;
    public $email;
    public $imagen;
    public $password;

    protected function rules(){
        return [
            'username' => [
                'required',
                Rule::unique('users')->ignore(auth()->id()),
                'min:3',
                'max:20',
                function ($attribute, $value, $fail) {
                    if (in_array($value, $this->getRouteNames())) {
                        $fail('El nombre de usuario escrito se encuentra reservado.');
                    }
                },
                'not_in:usuarios'
            ],
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore(auth()->id()),
                'min:3',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (in_array($value, $this->getRouteNames())) {
                        $fail('El correo escrito se encuentra reservado.');
                    }
                },
                'not_in:usuarios'
            ],
            'imagen' => 'nullable|image',
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = auth()->user();
                    if (!Hash::check($value, $user->password)) {
                        $fail('La contraseña escrita es incorrecta.');
                    }
                },
            ],
        ];
    }

    protected $messages = [
        'username.not_in' => 'El nombre de usuario escrito se encuentra reservado.',
    ];

    public function mount(){
        $this->username = auth()->user()->username;
        $this->email = auth()->user()->email;
    }

    public function editarUsuario(){
        
        $this->resetValidation();
        $this->validate();

        if($this->imagen){
            // $imagen = $request->file('file');

            $nombreImg = Str::uuid() . '.' . $this->imagen->extension();
            $imagenPath = public_path('perfiles') . "/" . $nombreImg;
    
            $imagenServidor = Image::make($this->imagen);
            $imagenServidor->fit(1000, 1000);
            
            $imagenServidor->save($imagenPath);
        }

        $slug = preg_replace('/[^a-zA-Z0-9\s\.\-_]/', '', $this->username);
        $slug = strtolower(preg_replace('/[\s\-\_]+/', '-', $slug));

        $usuario = User::find(auth()->id());
        
        $usuario->username = $slug;
        $usuario->email = $this->email;
        $usuario->imagen = $nombreImg ?? auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.profile', $usuario->username);
        
    }

    public function render(){
        return view('livewire.editar-perfil');
    }

    // ============================================================

    protected function getRouteNames(){
        $routes = collect(\Route::getRoutes())->map(function ($route) {
            // No permite que un usuario se ponga un "name" de una RUTA
            // return $route->getName();

            // No permite que un usuario se ponga una "URI" de una RUTA
            // dump($route->uri());
            return $route->uri();
        });

        return $routes->filter()->toArray();
        // return $routes->toArray();
    }
}
