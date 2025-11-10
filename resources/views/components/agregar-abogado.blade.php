@extends('layouts.app')

@section('title', 'Agregar Abogado')

@section('content')

{{-- Botón que abre modal --}}
<div class="w-full flex justify-center py-10">
    <button 
        id="openModalBtn"
        class="px-6 py-3 bg-[#0066cc] text-white font-semibold rounded-xl shadow-md hover:bg-[#003366] transition-all">
        Agregar Abogado
    </button>
</div>

{{-- Título principal --}}
<div class="text-center px-4">
    <h2 class="text-3xl font-bold text-[#003366]">Registro de Nuevo Abogado</h2>
    <p class="max-w-2xl mx-auto mt-3 text-gray-600 leading-relaxed">
        Ingrese la información profesional del abogado. Estos datos se mostrarán en la sección "Nuestro Equipo".
    </p>
</div>

{{-- Contenedor principal --}}
<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8">
    
    {{-- Aviso importante --}}
    <div class="bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg text-sm leading-relaxed">
        <strong>Nota:</strong> La información registrada debe ser verídica. Las imágenes deben representar al profesional correspondiente.
    </div>

    {{-- Subtítulo --}}
    <h3 class="mt-8 text-xl font-bold text-[#003366] border-b-2 border-[#0066cc] pb-2">
        Información del Profesional
    </h3>

    {{-- Aquí puedes agregar contenido adicional si lo deseas --}}

</div>

{{-- Modal incluido --}}
@include('components.modal-agregar-abogado')

@endsection
