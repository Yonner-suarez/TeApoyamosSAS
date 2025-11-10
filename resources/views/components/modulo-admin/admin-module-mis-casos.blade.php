@extends('layouts.app')

@section('title', 'Mis Casos - Firma Legal')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- HERO / Encabezado --}}
<section class="relative bg-[#002b5b] text-white py-24 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Gestión de Mis Casos
        </h1>
        <p class="text-lg md:text-xl mb-8">
            Mantente al día con tus casos legales.
        </p>
    </div>
</section>

{{-- Contenedor de casos --}}
<section class="max-w-6xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-[#002b5b] mb-10 text-center">Mis Casos</h2>

    <div id="casosContainer" class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        {{-- Casos dinámicos --}}
    </div>
</section>

{{-- MODAL (Editar Caso) --}}
<div id="modalCaso" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg relative">
        <h2 id="modalTitulo" class="text-2xl font-bold text-gray-800 mb-6">Editar Caso</h2>

        <form id="formCaso" class="space-y-4">
            <input type="hidden" id="casoId">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input type="text" id="titulo"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2"
                    placeholder="Título del caso" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea id="descripcion" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2"
                    placeholder="Descripción del caso"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select id="estado"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2">
                    <option value="abierto">Abierto</option>
                    <option value="en_progreso">En Progreso</option>
                    <option value="cerrado">Cerrado</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" id="btnCancelar"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg">Cancelar</button>
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-lg">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const API_BASE = 'http://127.0.0.1:8000/api/casos';
    const token = localStorage.getItem('token');
    const modal = document.getElementById('modalCaso');
    const modalTitulo = document.getElementById('modalTitulo');
    const btnCancelar = document.getElementById('btnCancelar');
    const form = document.getElementById('formCaso');
    const casosContainer = document.getElementById('casosContainer');

    function abrirModal(caso) {
        modal.classList.remove('hidden');
        document.getElementById('titulo').value = caso.titulo;
        document.getElementById('descripcion').value = caso.descripcion ?? '';
        document.getElementById('estado').value = caso.estado;
        document.getElementById('casoId').value = caso.id;
    }

    function cerrarModal() {
        modal.classList.add('hidden');
        form.reset();
    }

    async function cargarCasos() {
        try {
            const res = await fetch(`${API_BASE}`, { headers: { 'Authorization': `Bearer ${token}` } });
            const data = await res.json();
            casosContainer.innerHTML = '';

            data.data.forEach(caso => {
                const card = document.createElement('div');
                card.className = 'bg-white rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 p-6 flex flex-col items-start';
                card.innerHTML = `
                    <p class="text-gray-800 text-lg font-semibold mb-2">${caso.titulo}</p>
                    <p class="text-gray-600 mb-2">${caso.descripcion ?? ''}</p>
                    <span class="inline-block px-3 py-1 rounded-full text-white text-sm font-medium mb-2 ${caso.estado === 'abierto' ? 'bg-green-500' : caso.estado === 'en_progreso' ? 'bg-yellow-500' : 'bg-red-500'}">
                        ${caso.estado.replace('_', ' ').toUpperCase()}
                    </span>
                    <div class="flex justify-end w-full mt-2 space-x-3">
                        <button class="text-gray-500 hover:text-orange-500" title="Editar" onclick='editarCaso(${JSON.stringify(caso)})'>✏️</button>
                        <button class="text-gray-500 hover:text-red-600" title="Eliminar" onclick='eliminarCaso(${caso.id})'>🗑️</button>
                    </div>
                `;
                casosContainer.appendChild(card);
            });
        } catch (err) {
            console.error('Error cargando casos', err);
        }
    }

    async function actualizarCaso(formData) {
        const res = await fetch(`${API_BASE}/actualizar`, {
            method: 'POST',
            headers: { 'Authorization': `Bearer ${token}` },
            body: formData
        });
        return res.json();
    }

    async function eliminarCaso(id) {
        const confirm = await Swal.fire({
            title: '¿Eliminar caso?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e53e3e',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Sí, eliminar'
        });

        if (confirm.isConfirmed) {
            const res = await fetch(`${API_BASE}/eliminar`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id })
            });

            if (res.ok) {
                Swal.fire('Eliminado', 'El caso fue eliminado.', 'success');
                cargarCasos();
            } else {
                Swal.fire('Error', 'No se pudo eliminar.', 'error');
            }
        }
    }

    btnCancelar.addEventListener('click', cerrarModal);

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData();
        const id = document.getElementById('casoId').value;
        formData.append('titulo', document.getElementById('titulo').value);
        formData.append('descripcion', document.getElementById('descripcion').value);
        formData.append('estado', document.getElementById('estado').value);
        formData.append('id', id);

        try {
            await actualizarCaso(formData);
            Swal.fire('Éxito', 'Caso actualizado correctamente', 'success');
            cerrarModal();
            cargarCasos();
        } catch (error) {
            Swal.fire('Error', 'Hubo un problema al actualizar.', 'error');
        }
    });

    window.editarCaso = (caso) => abrirModal(caso);
    window.eliminarCaso = eliminarCaso;

    cargarCasos();
});
</script>
@endsection
