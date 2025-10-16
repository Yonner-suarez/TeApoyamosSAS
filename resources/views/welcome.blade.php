@extends('layouts.app')

@section('title', 'Te Apoyamos S.A.S')

@section('content')
<div class="flex-center full-height">
    <div class="content">
        <div class="title">Te Apoyamos S.A.S</div>
        <button class="btn-registrate" id="openModalBtn">Regístrate</button>
    </div>
</div>

@include('components.register-modal')

@push('scripts')
<script>
    const modal = document.getElementById('registerModal');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');

    openBtn.onclick = () => modal.style.display = 'block';
    closeBtn.onclick = () => modal.style.display = 'none';
    window.onclick = (event) => {
        if (event.target === modal) modal.style.display = 'none';
    };

    document.querySelector('#registerModal form').addEventListener('submit', async function (e) {
    e.preventDefault(); // evita recargar la página

    // Obtener los campos del formulario
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const telefono = document.getElementById('telefono').value;
    const experiencia = document.getElementById('experiencia').value;
    const hoja_vida = document.getElementById('hoja_vida').files[0];

    // Crear objeto FormData (para enviar archivos)
    const formData = new FormData();
    formData.append('nombre_completo', nombre);
    formData.append('correo', correo);
    formData.append('telefono', telefono);
    formData.append('experiencia', experiencia);
    formData.append('hoja_vida', hoja_vida);

    try {
        for (const [key, value] of formData.entries()) {
    console.log(key, value);
}

        const response = await fetch('http://127.0.0.1:8000/api/solicitud', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (response.ok) {
            alert('✅ Solicitud enviada correctamente');
            console.log(result);
        } else {
            alert('❌ Error al enviar la solicitud');
            console.error(result);
        }
    } catch (error) {
        alert('⚠️ Error de conexión con el servidor');
        console.error(error);
    }
});
</script>
@endpush
@endsection
