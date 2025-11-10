<div class="fixed top-0 left-0 w-full z-50 bg-blue-900 shadow-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            
            {{-- Logo --}}
            <a href="{{ route('index') }}" class="text-2xl font-bold tracking-wide text-white hover:text-blue-300 transition">
               TeApoyamosSAS
            </a>

            {{-- Menú principal --}}
            <ul class="hidden md:flex space-x-6 text-white font-semibold text-lg">
                <li>
                    <a href="{{ route('administracion.gestionar-mis-casos') }}"
                       class="hover:text-violet-300 transition {{ request()->routeIs('administracion.gestionar-mis-casos') ? 'text-violet-400' : '' }}">
                        Mis Casos
                    </a>
                </li>
                <li>
                    <a href="{{ route('administracion.new-caso') }}"
                       class="hover:text-violet-300 transition {{ request()->routeIs('administracion.new-caso') ? 'text-violet-400' : '' }}">
                        Nuevos Casos
                    </a>
                </li>
                <li>
                    <a href="{{ route('administracion.module-reporte') }}"
                       class="hover:text-violet-300 transition {{ request()->routeIs('administracion.module-reporte') ? 'text-violet-400' : '' }}">
                        Reportes
                    </a>
                </li>
                <li>
                    <a href="{{ route('administracion.gestionar-usuarios') }}"
                       class="hover:text-violet-300 transition {{ request()->routeIs('administracion.gestionar-usuarios') ? 'text-violet-400' : '' }}">
                        Gestionar Usuarios
                    </a>
                </li>
                <li>
                    <a href="#" id="logoutBtn" class="hover:text-red-400 transition flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                             class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M6 3a1 1 0 0 1 1-1h5.5a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5H7a1 1 0 0 1-1-1v-1h1v1h5.5v-11H7v1H6V3z"/>
                            <path fill-rule="evenodd"
                                  d="M11.146 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 8 7.438 10.854a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        Salir
                    </a>
                </li>
            </ul>

            {{-- Botón responsive (hamburguesa) --}}
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none text-white hover:text-blue-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Menú móvil --}}
    <div id="mobile-menu" class="md:hidden hidden bg-blue-800">
        <ul class="flex flex-col items-center space-y-4 py-4 text-white font-semibold">
            <li><a href="{{ route('administracion.gestionar-mis-casos') }}" class="hover:text-blue-300 transition">Mis Casos</a></li>
            <li><a href="{{ route('administracion.new-caso') }}" class="hover:text-blue-300 transition">Nuevos Casos</a></li>
            <li><a href="{{ route('administracion.module-reporte') }}" class="hover:text-blue-300 transition">Reportes</a></li>
            <li><a href="{{ route('administracion.gestionar-usuarios') }}" class="hover:text-blue-300 transition">Gestionar Usuarios</a></li>
            <li><a href="#" id="mobile-logout" class="hover:text-red-400 transition">Salir</a></li>
        </ul>
    </div>
</div>

<script>
    // Toggle menú móvil
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Logout
    function logout() {
        localStorage.removeItem('token');
        window.location.href = '/';
    }

    document.getElementById('logoutBtn').addEventListener('click', logout);
    document.getElementById('mobile-logout').addEventListener('click', logout);
</script>
