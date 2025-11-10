@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

    {{-- Título principal --}}
    <h2 class="text-3xl md:text-4xl font-bold text-center text-[#002b5b] mb-10">
        Trayectoria, Visión y Compromiso
    </h2>

    {{-- Sección principal --}}
    <section class="bg-white p-8 rounded-xl shadow-md">
        <p class="text-lg leading-relaxed text-gray-700">
            La firma de abogados <strong>“Te apoyamos SAS”</strong> se fundó bajo el principio de que el marco legal debe ser un 
            <strong>facilitador estratégico</strong>, no un obstáculo, para el desarrollo y desempeño correcto de cualquier organización. 
            Estamos conformados por un equipo de profesionales de alto nivel, disponibles para brindar <strong>asesoría legal proactiva</strong> 
            y apoyo esencial en la toma de decisiones.
        </p>

        {{-- Misión / Visión --}}
        <div class="grid md:grid-cols-2 gap-10 mt-10 pt-8 border-t border-dashed border-gray-300">

            <div>
                <h3 class="text-2xl font-semibold text-[#002b5b] mb-3">Misión</h3>
                <p class="text-gray-700 leading-relaxed">
                    Brindar soluciones legales integrales y éticas, enfocadas en minimizar riesgos y maximizar el 
                    cumplimiento normativo para garantizar la sostenibilidad y el crecimiento de nuestros clientes corporativos.
                </p>
            </div>

            <div>
                <h3 class="text-2xl font-semibold text-[#002b5b] mb-3">Visión</h3>
                <p class="text-gray-700 leading-relaxed">
                    Ser reconocidos como la firma líder a nivel nacional en asesoría legal estratégica para entornos profesionales, 
                    destacando por nuestra excelencia, innovación y compromiso con el éxito de cada organización que representamos.
                </p>
            </div>

        </div>
    </section>

    {{-- Reconocimientos --}}
    <section class="mt-16 text-center">
        <h2 class="text-3xl font-bold text-[#002b5b] mb-8">
            Reconocimientos y Alianzas Estratégicas
        </h2>

        <div class="flex flex-col md:flex-row justify-around items-center gap-6 bg-white p-6 rounded-xl shadow-md">
            <span class="text-lg font-semibold text-gray-700">Cámara de Comercio</span>
            <span class="text-lg font-semibold text-gray-700">Gremio Corporativo X</span>
            <span class="text-lg font-semibold text-blue-600">LegalTech Partners</span>
        </div>
    </section>

</div>

@endsection
