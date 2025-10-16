<nav class="navbar">
    <ul class="nav-list">
        <li><a href="{{ route('index') }}">Inicio</a></li>
        <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
        <li><a href="{{ route('servicios') }}">Servicios</a></li>
        <li><a href="{{ route('equipo') }}">Equipo</a></li>
        <li><a href="{{ route('trabaja') }}">Trabaja con nosotros</a></li>
        <li><a href="{{ route('contacto') }}">Contacto</a></li>
    </ul>
</nav>

<style>
.navbar {
    background-color: #003366;
    padding: 1rem;
}
.nav-list {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin: 0;
    padding: 0;
}
.nav-list li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.nav-list li a:hover {
    text-decoration: underline;
}
</style>
