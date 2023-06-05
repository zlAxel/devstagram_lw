@extends('layouts.app')

@section('titulo')
    Editar perfil {{ auth()->user()->username }}
@endsection

@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <livewire:editar-perfil>
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
