<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te Apoyamos SAS | @yield('title', 'Asesoría Legal Estratégica')</title> 
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
    @yield('styles') 
</head>
<body>
    <header>
        <div class="contenedor header-wrap">
            <div class="logo">
                <h1>Te Apoyamos SAS</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('nosotros') }}">Quiénes Somos</a></li>
                    <li><a href="{{ route('servicios') }}">Servicios</a></li>
                    <li><a href="{{ route('equipo') }}">Equipo</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content') 
    </main>

    <footer>
        <div class="contenedor footer-wrap">
            <div class="footer-info">
                <h3>Te Apoyamos SAS</h3>
                <p>Asesoría Legal y Soporte Estratégico.</p>
                <p>Tel: (031) XXX XXXX | Email: info@teapoyamos.com</p>
                <p><a href="{{ route('trabaja') }}">Trabaja con Nosotros</a></p>
            </div>
            <div class="footer-copy">
                &copy; {{ date('Y') }} Te Apoyamos SAS. Todos los derechos reservados.
                <p><a href="#">Políticas de Privacidad</a> | <a href="#">Términos de Servicio</a></p>
            </div>
        </div>
    </footer>
    @yield('scripts')
</body>
</html>