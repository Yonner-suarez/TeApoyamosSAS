@extends('layouts.app')

@section('title', 'Únete a Nuestro Equipo Legal')

@section('content')

{{-- Botón que abre modal --}}
<div class="w-full flex justify-center py-10">
    <button 
        id="openModalBtn"
        class="px-6 py-3 bg-[#0066cc] text-white font-semibold rounded-xl shadow-md hover:bg-[#003366] transition-all">
        Regístrate
    </button>
</div>

{{-- Título principal --}}
<div class="text-center px-4">
    <h2 class="text-3xl font-bold text-[#003366]">Únete a Nuestro Equipo Legal</h2>
    <p class="max-w-2xl mx-auto mt-3 text-gray-600 leading-relaxed">
        Si eres un profesional apasionado por el marco legal corporativo y el apoyo estratégico, 
        te invitamos a registrar tu hoja de vida para futuras oportunidades.
    </p>
</div>

{{-- Contenedor del registro --}}
<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8">
    
    {{-- Aviso --}}
    <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg text-sm leading-relaxed">
        <strong>Nota importante:</strong> Valoramos el cumplimiento de los lineamientos de seguridad.
        Los datos y documentos adjuntos serán tratados bajo estricta confidencialidad y solo con fines de evaluación de talento.
    </div>

    {{-- Título del formulario --}}
    <h3 class="mt-8 text-xl font-bold text-[#003366] border-b-2 border-[#0066cc] pb-2">
        Registro de Hoja de Vida
    </h3>

    {{-- Aquí va tu formulario --}}
    {{-- Puedes insertar tus inputs exactamente aquí --}}

</div>

@include('components.register-modal')

@endsection
