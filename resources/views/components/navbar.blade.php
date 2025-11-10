<nav class="bg-blue-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            {{-- Logo o nombre --}}
            <a href="{{ route('index') }}" class="text-2xl font-bold tracking-wide hover:text-blue-300 transition">
                TeApoyamosSAS
            </a>

            {{-- Menú principal --}}
            <ul class="hidden md:flex space-x-8 text-lg">
                <li><a href="{{ route('index') }}" class="hover:text-blue-300 transition">Inicio</a></li>
                <li><a href="{{ route('nosotros') }}" class="hover:text-blue-300 transition">Nosotros</a></li>
                <li><a href="{{ route('servicios') }}" class="hover:text-blue-300 transition">Servicios</a></li>
                <li><a href="{{ route('equipo') }}" class="hover:text-blue-300 transition">Equipo</a></li>
                <li><a href="{{ route('trabaja') }}" class="hover:text-blue-300 transition">Trabaja con nosotros</a></li>
                <li><a href="{{ route('contacto') }}" class="hover:text-blue-300 transition">Contacto</a></li>
            </ul>

            {{-- Botón responsive (hamburguesa) --}}
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none text-white hover:text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Menú móvil --}}
    <div id="mobile-menu" class="md:hidden hidden bg-blue-800">
        <ul class="flex flex-col items-center space-y-4 py-4">
            <li><a href="{{ route('index') }}" class="hover:text-blue-300 transition">Inicio</a></li>
            <li><a href="{{ route('nosotros') }}" class="hover:text-blue-300 transition">Nosotros</a></li>
            <li><a href="{{ route('servicios') }}" class="hover:text-blue-300 transition">Servicios</a></li>
            <li><a href="{{ route('equipo') }}" class="hover:text-blue-300 transition">Equipo</a></li>
            <li><a href="{{ route('trabaja') }}" class="hover:text-blue-300 transition">Trabaja con nosotros</a></li>
            <li><a href="{{ route('contacto') }}" class="hover:text-blue-300 transition">Contacto</a></li>
        </ul>
    </div>
</nav>

<!-- Agrega SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal Login -->
<div id="loginModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white w-full max-w-md rounded-2xl p-6 relative">
        <h2 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h2>
        <form id="loginForm" class="space-y-4">
            <div>
                <label for="correo" class="block text-gray-700">Correo:</label>
                <input type="email" id="correo" name="correo" class="w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Contraseña:</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-md hover:bg-blue-700 transition">Ingresar</button>
        </form>
        <button id="closeLoginModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>
    </div>
</div>

<script>
    // Abrir modal al hacer clic en el título
    const title = document.querySelector('a[href="{{ route('index') }}"]');
    const loginModal = document.getElementById('loginModal');
    const closeModal = document.getElementById('closeLoginModal');

    title.addEventListener('click', function(e) {
        e.preventDefault(); // evitar redirección
        loginModal.classList.remove('opacity-0', 'pointer-events-none');
    });

    closeModal.addEventListener('click', () => {
        loginModal.classList.add('opacity-0', 'pointer-events-none');
    });

    loginModal.addEventListener('click', (e) => {
        if(e.target === loginModal) {
            loginModal.classList.add('opacity-0', 'pointer-events-none');
        }
    });

    // Login con fetch y SweetAlert2
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const correo = document.getElementById('correo').value;
        const password = document.getElementById('password').value;

        try {
            const response = await fetch('api/usuario/iniciar-sesion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ correo, password })
            });

            const data = await response.json();

            if(response.ok && data.token) {
                localStorage.setItem('token', data.token);

                // Mostrar SweetAlert de éxito
                await Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido!',
                    text: 'Inicio de sesión exitoso',
                    timer: 1500,
                    showConfirmButton: false
                });

                // Cerrar modal y redirigir
                loginModal.classList.add('opacity-0', 'pointer-events-none');
                window.location.href = '/administracion/Mis_casos';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Credenciales incorrectas'
                });
            }

        } catch (error) {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error, intente de nuevo'
            });
        }
    });
</script>



<script>
    // Script para menú móvil
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
