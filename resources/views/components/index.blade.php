@extends('layouts.app')

@section('title', 'Firma de Asesoría Legal Corporativa')

@section('styles')
<style>
    :root {
        --azul: #002b5b;
        --azul-claro: #007bff;
        --blanco: #ffffff;
        --gris: #f5f5f5;
        --texto-principal: #333333;
        --borde: #e0e0e0;
    }

    body {
        font-family: "Poppins", sans-serif;
        color: var(--texto-principal);
        background-color: var(--blanco);
        line-height: 1.6;
    }

    .contenedor {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* ===== HERO ===== */
    .hero {
        background: linear-gradient(rgba(0, 43, 91, 0.8), rgba(0, 43, 91, 0.8)),
                    url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1920&q=80')
                    center/cover no-repeat;
        color: var(--blanco);
        padding: 120px 20px;
        text-align: center;
        border-bottom: 5px solid var(--azul-claro);
    }

    .hero h1 {
        font-size: 2.8rem;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .hero p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-cta {
        display: inline-block;
        background: var(--azul-claro);
        color: var(--blanco);
        padding: 12px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .btn-cta:hover {
        background: #0056b3;
    }

    /* ===== TARJETAS ===== */
    .titulo-seccion {
        text-align: center;
        font-size: 2rem;
        margin: 60px 0 30px;
        color: var(--azul);
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .tarjeta {
        background: var(--gris);
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .tarjeta:hover {
        transform: translateY(-8px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .tarjeta-icono {
        font-size: 2.5rem;
        display: block;
        margin-bottom: 15px;
    }

    .tarjeta h3 {
        margin-bottom: 10px;
        color: var(--azul);
    }

    .tarjeta p {
        font-size: 0.95rem;
    }

    .tarjeta a {
        color: var(--azul-claro);
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin-top: 8px;
    }

    /* ===== CIFRAS ===== */
    .seccion-cifras {
        background: var(--azul);
        color: var(--blanco);
        padding: 60px 0;
        text-align: center;
        margin-top: 50px;
    }

    .seccion-cifras h2 {
        margin-bottom: 40px;
        font-size: 2rem;
    }

    .cifras-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 60px;
    }

    .cifra h3 {
        font-size: 2.8rem;
        margin-bottom: 8px;
        color: var(--azul-claro);
    }

    .cifra p {
        font-weight: 600;
        color: var(--blanco);
    }
</style>
@endsection

@section('content')
    {{-- HERO --}}
    <section class="hero">
        <div class="hero-contenido contenedor">
            <h1>Soluciones Legales Estratégicas para su Organización</h1>
            <p>Brindamos asesoría legal proactiva y soporte en la toma de decisiones para un desempeño corporativo correcto y seguro.</p>
            <a href="{{ route('contacto') }}" class="btn-cta">Solicitar Asesoría Ahora</a>
        </div>
    </section>

    {{-- ÁREAS DE PRÁCTICA --}}
    <section class="contenedor">
        <h2 class="titulo-seccion">Áreas de Práctica Clave</h2>
        <div class="grid-3">
            <div class="tarjeta">
                <span class="tarjeta-icono">⚖️</span>
                <h3>Derecho Corporativo</h3>
                <p>Estructuración legal, cumplimiento normativo y soporte en fusiones y adquisiciones.</p>
            </div>
            <div class="tarjeta">
                <span class="tarjeta-icono">💼</span>
                <h3>Laboral y RRHH</h3>
                <p>Gestión de contratos, litigios laborales y cumplimiento de la legislación de personal.</p>
            </div>
            <div class="tarjeta">
                <span class="tarjeta-icono">📰</span>
                <h3>Noticias de Interés</h3>
                <p>Manténgase actualizado con los últimos cambios en el marco legal que afectan a su sector.</p>
                <a href="{{ route('contacto') }}">Ver Más</a>
            </div>
        </div>
    </section>

    {{-- CIFRAS --}}
    <section class="seccion-cifras">
        <div class="contenedor">
            <h2>Nuestra Trayectoria en Cifras</h2>
            <div class="cifras-grid">
                <div class="cifra">
                    <h3>15+</h3>
                    <p>Años de Experiencia</p>
                </div>
                <div class="cifra">
                    <h3>98%</h3>
                    <p>Casos con Resolución Exitosa</p>
                </div>
                <div class="cifra">
                    <h3>12</h3>
                    <p>Profesionales Adscritos</p>
                </div>
            </div>
        </div>
    </section>
@endsection
