@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')

    <x-mostrar-posts :posts="$posts" titulo="" />
    
@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
