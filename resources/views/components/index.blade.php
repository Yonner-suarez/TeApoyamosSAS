@extends('layouts.app')

@section('title', 'Firma de Asesoría Legal Corporativa')

@section('content')

{{-- HERO --}}
<section class="relative bg-cover bg-center bg-no-repeat py-28 px-6 text-white"
    style="background-image: linear-gradient(rgba(0,43,91,0.8), rgba(0,43,91,0.8)),
        url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1920&q=80');">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            Soluciones Legales Estratégicas para su Organización
        </h1>
        <p class="text-lg md:text-xl mb-8">
            Brindamos asesoría legal proactiva y soporte en la toma de decisiones para un desempeño corporativo correcto y seguro.
        </p>
        <a href="{{ route('contacto') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 transition text-white font-semibold px-8 py-3 rounded-full shadow">
            Solicitar Asesoría Ahora
        </a>
    </div>
</section>

{{-- ÁREAS DE PRÁCTICA --}}
<section class="max-w-6xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-center text-[#002b5b] mb-12">
        Áreas de Práctica Clave
    </h2>

    <div class="grid gap-8 md:grid-cols-3">
        {{-- Tarjeta 1 --}}
        <div class="bg-gray-100 p-8 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-2 text-center">
            <span class="text-5xl mb-4 block">⚖️</span>
            <h3 class="text-xl font-semibold text-[#002b5b] mb-2">Derecho Corporativo</h3>
            <p class="text-gray-700">
                Estructuración legal, cumplimiento normativo y soporte en fusiones y adquisiciones.
            </p>
        </div>

        {{-- Tarjeta 2 --}}
        <div class="bg-gray-100 p-8 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-2 text-center">
            <span class="text-5xl mb-4 block">💼</span>
            <h3 class="text-xl font-semibold text-[#002b5b] mb-2">Laboral y RRHH</h3>
            <p class="text-gray-700">
                Gestión de contratos, litigios laborales y cumplimiento de la legislación de personal.
            </p>
        </div>

        {{-- Tarjeta 3 --}}
        <div class="bg-gray-100 p-8 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-2 text-center">
            <span class="text-5xl mb-4 block">📰</span>
            <h3 class="text-xl font-semibold text-[#002b5b] mb-2">Noticias de Interés</h3>
            <p class="text-gray-700">
                Manténgase actualizado con los últimos cambios en el marco legal que afectan a su sector.
            </p>
           
        </div>
    </div>
</section>

{{-- CIFRAS --}}
<section class="bg-[#002b5b] text-white py-16">
    <div class="max-w-5xl mx-auto text-center px-6">
        <h2 class="text-3xl font-bold mb-14">Nuestra Trayectoria en Cifras</h2>

        <div class="flex flex-wrap justify-center gap-16">
            <div>
                <h3 class="text-5xl font-extrabold text-blue-400 mb-2">15+</h3>
                <p class="text-lg font-semibold">Años de Experiencia</p>
            </div>

            <div>
                <h3 class="text-5xl font-extrabold text-blue-400 mb-2">98%</h3>
                <p class="text-lg font-semibold">Casos con Resolución Exitosa</p>
            </div>

            <div>
                <h3 class="text-5xl font-extrabold text-blue-400 mb-2">12</h3>
                <p class="text-lg font-semibold">Profesionales Adscritos</p>
            </div>
        </div>
    </div>
</section>

@endsection
