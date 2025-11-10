@extends('layouts.app')

@section('title', 'Nuevo Caso - Firma Legal')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- HERO / Encabezado --}}
<section class="relative bg-[#002b5b] text-white py-24 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Agregar Nuevo Caso
        </h1>
        <p class="text-lg md:text-xl mb-8">
            Crea un nuevo caso y asígnalo a ti mismo.
        </p>
        <button id="btnAgregar"
            class="bg-orange-500 hover:bg-orange-600 transition text-white font-semibold px-8 py-3 rounded-full shadow-lg">
            Agregar Caso
        </button>
    </div>
</section>

{{-- MODAL (Agregar Caso) --}}
<div id="modalCaso" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 overflow-auto">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg relative">
        <h2 id="modalTitulo" class="text-2xl font-bold text-gray-800 mb-6">Agregar Caso</h2>

        <form id="formCaso" class="space-y-4">
            {{-- Título --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input type="text" id="titulo"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2"
                    placeholder="Título del caso" required>
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea id="descripcion" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 p-2"
                    placeholder="Descripción del caso"></textarea>
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
    const userId = localStorage.getItem('user_id'); // extraer id del usuario del token
    const modal = document.getElementById('modalCaso');
    const btnAgregar = document.getElementById('btnAgregar');
    const btnCancelar = document.getElementById('btnCancelar');
    const form = document.getElementById('formCaso');

    function abrirModal() {
        modal.classList.remove('hidden');
        form.reset();
    }

    function cerrarModal() {
        modal.classList.add('hidden');
        form.reset();
    }

    async function agregarCaso(formData) {
        try {
            const res = await fetch(`${API_BASE}/agregar`, {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` },
                body: formData
            });

            const data = await res.json();

            if (data.status) {
                await Swal.fire('Éxito', data.message, 'success');
                window.location.href = '/administracion/Mis_casos';
            } else {
                await Swal.fire('Error', data.error || 'Hubo un problema al agregar el caso', 'error');
            }
        } catch (err) {
            Swal.fire('Error', 'No se pudo conectar con el servidor', 'error');
        }
    }

    btnAgregar.addEventListener('click', abrirModal);
    btnCancelar.addEventListener('click', cerrarModal);

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('titulo', document.getElementById('titulo').value);
        formData.append('descripcion', document.getElementById('descripcion').value);
        formData.append('usuario_id', userId); // asignar al usuario logueado
        agregarCaso(formData);
    });
});
</script>
@endsection
