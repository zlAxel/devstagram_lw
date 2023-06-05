@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
    {{-- {{ dd(request()->cookie('previous_url')); }} --}}
    {{-- {{ dd(session('previous_url')); }} --}}
@endsection

@section('contenido')

    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . "/" . $post->imagen) }}" alt="Titulo de la imagen {{ $post->titulo }}">

            <div class="p-3">
                <livewire:like :post="$post" />
            </div>
            <div>
                <a href="{{ route('posts.profile', $post->user->username) }}" class="font-bold pl-3">
                    {{ $post->user->username }}
                </a>
                <p class="text-sm text-gray-500 pl-3">
                    {{ ucwords($post->created_at->diffForHumans()) }}
                </p>
                <p class="pl-3 mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if (auth()->user()->id === $post->user_id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar publicación" class="bg-red-600 hover:bg-red-500 p-2 rounded text-white font-bold mt-2 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">
                        Agregar un comentario
                    </p>
                    <livewire:crear-comentario :post="$post" />
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    <livewire:mostrar-comentarios :post="$post" />
                </div>
            </div>
        </div>
    </div>
    
@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
