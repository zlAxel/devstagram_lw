@extends('layouts.app')

@section('titulo')
    Creando una nueva publicación
@endsection

@section('contenido')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('posts.imagen.store') }}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-2 border-dashed w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            <livewire:crear-post />
        </div>
    </div>
    
@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
