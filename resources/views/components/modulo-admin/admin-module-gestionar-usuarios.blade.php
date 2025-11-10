@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="w-full max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-56">

    {{-- Botón Agregar --}}
    <div class="text-right mb-6">
        <button id="btnAgregar"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition duration-300 ease-in-out">
            Agregar Usuario
        </button>
    </div>

    {{-- Contenedor de usuarios --}}
    <div id="usuariosContainer" class="space-y-4">
        {{-- Usuarios dinámicos --}}
    </div>
</div>

{{-- MODAL (Agregar / Editar Usuario / Abogado) --}}
<div id="modalUsuario" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center overflow-auto hidden z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-lg relative max-h-[90vh] overflow-y-auto">

        <h2 id="modalTitulo" class="text-2xl font-bold text-gray-800 mb-4">Agregar Usuario</h2>

        <form id="formUsuario" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" id="usuarioId">

            {{-- Nombre --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            {{-- Correo --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                <input type="email" id="correo" name="correo" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            {{-- Rol --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                <select id="rol" name="rol" class="w-full border-gray-300 rounded-lg p-2" required>
                    <option value="">Selecciona un rol</option>
                    <option value="abogado">Abogado</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            {{-- Contraseña --}}
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full border-gray-300 rounded-lg p-2 pr-10">
                <button type="button" id="togglePassword" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">👁️</button>
            </div>

            {{-- Confirmar Contraseña --}}
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border-gray-300 rounded-lg p-2 pr-10">
                <button type="button" id="togglePasswordConfirm" class="absolute right-2 top-2 text-gray-500 hover:text-gray-700">👁️</button>
            </div>

            {{-- Campos solo para Abogado --}}
            <div id="abogadoCampos" class="hidden space-y-2 mt-2">
                {{-- Especialidad --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                    <select id="especialidad" name="especialidad" class="w-full border-gray-300 rounded-lg p-2">
                        <option value="">Selecciona una especialidad</option>
                        <option value="Derecho Corporativo">Derecho Corporativo</option>
                        <option value="Derecho Laboral">Derecho Laboral</option>
                        <option value="Derecho Tributario">Derecho Tributario</option>
                        <option value="Derecho Civil">Derecho Civil</option>
                        <option value="Derecho Penal">Derecho Penal</option>
                        <option value="Derecho Comercial">Derecho Comercial</option>
                    </select>
                </div>

                {{-- Ubicación --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación</label>
                    <select id="ubicacion" name="ubicacion" class="w-full border-gray-300 rounded-lg p-2">
                        <option value="">Selecciona una ciudad</option>
                        <option value="Bogotá">Bogotá</option>
                        <option value="Medellín">Medellín</option>
                        <option value="Cali">Cali</option>
                        <option value="Barranquilla">Barranquilla</option>
                        <option value="Bucaramanga">Bucaramanga</option>
                    </select>
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto (opcional)</label>
                    <input type="file" id="foto" name="foto" accept="image/*" class="w-full border-gray-300 rounded-lg p-2">
                    <img id="previewFoto" class="mt-2 w-32 h-32 object-cover rounded-lg hidden">
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" id="btnCancelar" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">Cancelar</button>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">Guardar</button>
            </div>
        </form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const API_BASE = 'http://127.0.0.1:8000/api/usuario';
    const token = localStorage.getItem('token');
    const modal = document.getElementById('modalUsuario');
    const modalTitulo = document.getElementById('modalTitulo');
    const btnAgregar = document.getElementById('btnAgregar');
    const btnCancelar = document.getElementById('btnCancelar');
    const form = document.getElementById('formUsuario');
    const usuariosContainer = document.getElementById('usuariosContainer');
    const rolSelect = document.getElementById('rol');
    const abogadoCampos = document.getElementById('abogadoCampos');
    const previewFoto = document.getElementById('previewFoto');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    let modo = 'agregar';

    // Mostrar campos solo si es abogado
    rolSelect.addEventListener('change', () => {
        abogadoCampos.classList.toggle('hidden', rolSelect.value !== 'abogado');
    });

    // Preview de foto
    document.getElementById('foto').addEventListener('change', e => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = ev => {
                previewFoto.src = ev.target.result;
                previewFoto.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Mostrar / ocultar contraseña
    togglePassword.addEventListener('click', () => {
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    });
    togglePasswordConfirm.addEventListener('click', () => {
        passwordConfirmInput.type = passwordConfirmInput.type === 'password' ? 'text' : 'password';
    });

    function abrirModal(titulo, data = null) {
        modal.classList.remove('hidden');
        modalTitulo.textContent = titulo;
        document.getElementById('nombre').value = data ? data.nombre : '';
        document.getElementById('correo').value = data ? data.correo : '';
        rolSelect.value = data ? data.rol : '';
        document.getElementById('usuarioId').value = data ? data.id : '';
        passwordInput.value = '';
        passwordConfirmInput.value = '';

        if (data && data.rol === 'abogado') {
            abogadoCampos.classList.remove('hidden');
            document.getElementById('especialidad').value = data.especialidad || '';
            document.getElementById('ubicacion').value = data.ubicacion || '';
            previewFoto.src = data.foto || '';
            previewFoto.classList.toggle('hidden', !data.foto);
        } else {
            abogadoCampos.classList.add('hidden');
        }
        modo = data ? 'editar' : 'agregar';
    }

    function cerrarModal() {
        modal.classList.add('hidden');
        form.reset();
        previewFoto.classList.add('hidden');
        abogadoCampos.classList.add('hidden');
    }

    async function cargarUsuarios() {
        try {
            const res = await fetch(API_BASE, { headers: { 'Authorization': `Bearer ${token}` } });
            const data = await res.json();
            usuariosContainer.innerHTML = '';
            data.data.forEach(usuario => {
                const card = document.createElement('div');
                card.className = 'bg-white border-l-8 border-blue-500 p-4 flex justify-between items-center rounded-lg shadow-lg';
                card.innerHTML = `
                    <div>
                        <p class="text-gray-800 font-semibold">${usuario.nombre}</p>
                        <p class="text-gray-500 text-sm">${usuario.correo}</p>
                        <p class="text-gray-500 text-sm capitalize">${usuario.rol}</p>
                        ${usuario.rol === 'abogado' ? `
                        <p class="text-gray-500 text-sm">${usuario.especialidad} - ${usuario.ubicacion}</p>` : ''}
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-gray-500 hover:text-blue-500" title="Editar" onclick='editarUsuario(${JSON.stringify(usuario)})'>✏️</button>
                        <button class="text-gray-500 hover:text-red-600" title="Eliminar" onclick='eliminarUsuario(${usuario.id})'>🗑️</button>
                    </div>
                `;
                usuariosContainer.appendChild(card);
            });
        } catch (err) {
            console.error('Error cargando usuarios', err);
        }
    }

    async function guardarUsuario(formData) {
        let url = `${API_BASE}/abogado`;
        if (modo === 'editar') url = `${API_BASE}/actualizar`;
        const res = await fetch(url, {
            method: 'POST',
            headers: { 'Authorization': `Bearer ${token}` },
            body: formData
        });
        return res.json();
    }

    async function eliminarUsuario(id) {
        const confirm = await Swal.fire({
            title: '¿Eliminar usuario?',
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
                Swal.fire('Eliminado', 'El usuario fue eliminado.', 'success');
                cargarUsuarios();
            } else {
                Swal.fire('Error', 'No se pudo eliminar.', 'error');
            }
        }
    }

    btnAgregar.addEventListener('click', () => abrirModal('Agregar Usuario'));
    btnCancelar.addEventListener('click', cerrarModal);

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Validación de contraseña
        if (passwordInput.value || modo === 'agregar') {
            if (passwordInput.value !== passwordConfirmInput.value) {
                Swal.fire('Error', 'Las contraseñas no coinciden', 'error');
                return;
            }
        }

        const formData = new FormData(form);
        formData.append('id', document.getElementById('usuarioId').value);

        try {
            await guardarUsuario(formData);
            Swal.fire('Éxito', `Usuario ${modo === 'agregar' ? 'agregado' : 'actualizado'} correctamente`, 'success');
            cerrarModal();
            cargarUsuarios();
        } catch (error) {
            Swal.fire('Error', 'Hubo un problema al guardar.', 'error');
        }
    });

    window.editarUsuario = (usuario) => abrirModal('Editar Usuario', usuario);
    window.eliminarUsuario = eliminarUsuario;

    cargarUsuarios();
});
</script>
@endsection
