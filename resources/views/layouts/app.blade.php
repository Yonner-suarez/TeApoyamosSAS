<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Te Apoyamos S.A.S')</title>
    <link rel="icon" href="data:image/svg+xml,
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
        <text y='.9em' font-size='90'>⚖️</text>
    </svg>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

</head>
<body>
  @if(request()->is('administracion*'))
        @include('components.modulo-admin.navbar-admin')
    @else
        @include('components.navbar')
    @endif
    @yield('content')

 <script>
document.addEventListener("DOMContentLoaded", function () {
    // --- MODAL ---
    const modal = document.getElementById('registerModal');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');

    if (openBtn && closeBtn && modal) {
        // abrir modal
        openBtn.addEventListener('click', () => {
            modal.classList.remove('opacity-0', 'pointer-events-none');
        });

        // cerrar modal
        closeBtn.addEventListener('click', () => {
            modal.classList.add('opacity-0', 'pointer-events-none');
        });

        // cerrar clic afuera
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    }

    // --- FORMULARIO ---
    const form = modal.querySelector('form');
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const nombre = document.getElementById('nombre').value;
            const correo = document.getElementById('correo').value;
            const telefono = document.getElementById('telefono').value;
            const experiencia = document.getElementById('experiencia').value;
            const hoja_vida = document.getElementById('hoja_vida').files[0];

            const formData = new FormData();
            formData.append('nombre_completo', nombre);
            formData.append('correo', correo);
            formData.append('telefono', telefono);
            formData.append('experiencia', experiencia);
            formData.append('hoja_vida', hoja_vida);

            try {
                const response = await fetch('http://127.0.0.1:8000/api/solicitud', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Solicitud enviada!',
                        text: 'Tu hoja de vida ha sido enviada correctamente.',
                        confirmButtonColor: '#0066cc'
                    });
                    form.reset();
                    modal.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo enviar la solicitud. Intenta nuevamente.',
                        confirmButtonColor: '#0066cc'
                    });
                    console.error(result);
                }
            } catch (error) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error de conexión',
                    text: 'No se pudo conectar con el servidor.',
                    confirmButtonColor: '#0066cc'
                });
                console.error(error);
            }
        });
    }
});
</script>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
