@extends('layouts.app')

@section('title', 'Reportes de Casos - Firma Legal')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- HERO / Encabezado --}}
<section class="relative bg-[#002b5b] text-white py-24 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Reportes de Casos
        </h1>
        <p class="text-lg md:text-xl mb-8">
            Visualiza los reportes generados de cada caso.
        </p>
    </div>
</section>

{{-- Contenedor de tabla --}}
<section class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-[#002b5b] mb-10 text-center">Reportes</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-xl shadow-lg">
            <thead class="bg-[#002b5b] text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Caso</th>
                    <th class="py-3 px-4 text-left">Abogado / Usuario</th>
                    <th class="py-3 px-4 text-left">Estado</th>
                    <th class="py-3 px-4 text-left">Fecha Inicio</th>
                    <th class="py-3 px-4 text-left">Fecha Cierre</th>
                    <th class="py-3 px-4 text-left">Reporte</th>
                </tr>
            </thead>
            <tbody id="reportesContainer" class="divide-y">
                {{-- Filas dinámicas --}}
            </tbody>
        </table>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const API_BASE = 'http://127.0.0.1:8000/api/casos';
    const token = localStorage.getItem('token');
    const reportesContainer = document.getElementById('reportesContainer');

    async function cargarReportes() {
        try {
            const res = await fetch(`${API_BASE}`, {
                headers: { 'Authorization': `Bearer ${token}` }
            });
            const data = await res.json();
            reportesContainer.innerHTML = '';

            data.data.forEach(caso => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-100';
                row.innerHTML = `
                    <td class="py-3 px-4">${caso.titulo}</td>
                    <td class="py-3 px-4">${caso.usuario_nombre ? caso.usuario_nombre : 'Sin asignar'}</td>
                    <td class="py-3 px-4 capitalize">${caso.estado.replace('_', ' ')}</td>
                    <td class="py-3 px-4">${caso.fecha_inicio ? new Date(caso.fecha_inicio).toLocaleDateString() : '-'}</td>
                    <td class="py-3 px-4">${caso.fecha_cierre ? new Date(caso.fecha_cierre).toLocaleDateString() : '-'}</td>
                    <td class="py-3 px-4">${caso.reporte ?? '-'}</td>
                `;
                reportesContainer.appendChild(row);
            });
        } catch (err) {
            console.error('Error cargando reportes', err);
        }
    }

    cargarReportes();
});
</script>
@endsection
