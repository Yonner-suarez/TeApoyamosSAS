<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Te Apoyamos S.A.S')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .title {
            font-size: 84px;
            margin-bottom: 30px;
        }

        .btn-registrate {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            border: none;
        }

        .btn-registrate:hover {
            background-color: #2779bd;
        }

        /* Modal base */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button.submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #38c172;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button.submit-btn:hover {
            background-color: #2f9e67;
        }
    </style>
    @stack('styles')
    @include('components.navbar')

</head>
<body>
    @yield('content')

    @stack('scripts')
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
</body>
</html>
