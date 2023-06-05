<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request){
        // $user = json_decode(json_encode($user->toArray()));
        return view('perfil.index');
    }
}
