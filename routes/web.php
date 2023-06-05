<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

// Sección de usuarios

Route::group(['prefix' => 'usuarios'], function () {
    Route::view('/registrar', 'auth.register')->name('register');
    Route::view('/iniciar-sesion', 'auth.login')->name('login');
    Route::post('/cerrar-sesion', LogoutController::class)->name('logout');
    Route::get('/editar-perfil', PerfilController::class)->name('perfil.index');
});

// Rutas para los post's

Route::group(['prefix' => 'posts'], function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::delete('/create/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Guarda solo la imagen, y no el registro completo
    Route::post('/create/imagen/store', [PostController::class, 'store'])->name('posts.imagen.store'); // Guarda solo la imagen, y no el registro completo
    Route::get('/p/{post:postname}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{user:username}', [PostController::class, 'profile'])->name('posts.profile');
    // Route::get('/{user:username}/{post:postname}', [PostController::class, 'show'])->name('posts.show');
});
