@extends('layouts.app')

@section('titulo')
    Visitando a {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles/' . $user->imagen ) : asset('img/usuario.svg') }}" alt="Imagen del usuario ">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:items-start md:justify-center py-10 md:py-0">
                <div class="flex items-center gap-2 mb-5">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                    @auth
                        @if (auth()->user()->id === $user->id)
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                </svg>     
                            </a>         
                        @endif
                    @endauth
                </div>

                <livewire:seguir-usuario :user="$user" />

            </div>
        </div>
    </div>

    <x-mostrar-posts :posts="$posts" titulo="Publicaciones" />
    
@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
