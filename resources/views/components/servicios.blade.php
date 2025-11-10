@extends('layouts.app')

@section('title', 'Servicios y Áreas de Práctica')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    <!-- TÍTULO -->
    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-[#002b5b]">
        Nuestras Áreas de Práctica Legal
    </h2>

    <p class="text-center text-gray-600 max-w-2xl mx-auto mt-3">
        Ofrecemos soluciones legales especializadas para la protección y el crecimiento estratégico 
        de su organización en un marco de cumplimiento estricto.
    </p>

    <!-- GRID TARJETAS -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">🏢</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Derecho Corporativo y Societario</h3>
            <p class="text-gray-600 mt-2">
                Asesoría en estructuración, modificación y disolución de sociedades. Revisión de estatutos, actas y contratos comerciales.
            </p>
            
        </div>

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">⚖️</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Relaciones Laborales y RRHH</h3>
            <p class="text-gray-600 mt-2">
                Contratos laborales, litigios, reglamentos internos y procesos disciplinarios bajo normativa vigente.
            </p>
            
        </div>

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">💡</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Propiedad Intelectual y Tecnología</h3>
            <p class="text-gray-600 mt-2">
                Registro de marcas, patentes, derechos de autor y asesoría legal tecnológica.
            </p>
            
        </div>

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">✅</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Compliance y Gestión de Riesgos</h3>
            <p class="text-gray-600 mt-2">
                Programas de cumplimiento, prevención de delitos corporativos y ética empresarial.
            </p>
            
        </div>

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">💰</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Asesoría Fiscal y Tributaria</h3>
            <p class="text-gray-600 mt-2">
                Planeación tributaria, gestión de impuestos y representación ante entidades fiscales.
            </p>
            
        </div>

        <!-- TARJETA -->
        <div class="bg-white p-8 shadow-lg rounded-2xl border border-gray-100 hover:shadow-xl transition">
            <span class="text-5xl mb-4 block">📜</span>
            <h3 class="text-xl font-semibold text-[#002b5b]">Contratación con el Estado</h3>
            <p class="text-gray-600 mt-2">
                Acompañamiento en licitaciones, pliegos y contratos con entidades públicas.
            </p>
            
        </div>

    </section>

    <!-- CTA FINAL -->
    <section class="text-center bg-white shadow-md rounded-2xl p-10 mt-16 border border-gray-100">
        <h3 class="text-2xl font-bold text-[#002b5b]">
            ¿Necesita una solución que no ve aquí?
        </h3>
        <p class="text-gray-600 mt-2">
            Contáctenos y evaluaremos su caso específico con el profesional adecuado.
        </p>
        <a href="{{ route('contacto') }}"
           class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-xl shadow transition hover:bg-blue-700">
           Hable con un Abogado
        </a>
    </section>

</div>


@endsection
