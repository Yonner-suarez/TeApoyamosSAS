@extends('layouts.app')

@section('title', 'Nuestro Equipo de Profesionales')

@section('content')
<section id="equipoGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-12">
    <!-- Aquí se insertan las cards dinámicamente -->
</section>

<script>
document.addEventListener("DOMContentLoaded", async () => {

    const container = document.getElementById('equipoGrid');

    try {
        const response = await fetch("http://127.0.0.1:8000/api/usuario");
        const result = await response.json();

        if (!result.status) {
            container.innerHTML = "<p>Error cargando los datos.</p>";
            return;
        }

        let html = "";

        result.data.forEach(persona => {
            html += `
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition">
                    
                    <img 
                       src="${persona.foto}" 
                        alt="Foto de ${persona.nombre}"
                        class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-300"
                    />
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-[#002b5b]">${persona.nombre}</h3>
                        <p class="text-blue-600 font-semibold mt-1">${persona.especialidad}</p>
                        <small class="text-gray-500 block mt-3">Ubicación: ${persona.ubicacion}</small>

                    </div>
                </div>
            `;
        });

        container.innerHTML = html;

    } catch (error) {
        console.error(error);
        container.innerHTML = "<p>Error de conexión con el servidor.</p>";
    }

});
</script>
@endsection
