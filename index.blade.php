@extends('layouts.app')

@section('title', 'Firma de Asesoría Legal Corporativa')

@section('content')
    <section class="hero">
        <div class="hero-contenido contenedor">
            <h2>Soluciones Legales Estratégicas para su Organización.</h2>
            <p>Brindamos asesoría legal proactiva y soporte en la toma de decisiones para un desempeño corporativo correcto y seguro.</p>
            <a href="{{ route('contacto') }}" class="btn-cta">Solicitar Asesoría Ahora</a>
        </div>
    </section>

    <section class="contenedor">
        <h2 style="text-align: center; margin-top: 40px;">Áreas de Práctica Clave</h2>
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
                <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Ver Más</a>
            </div>
        </div>
    </section>

    <section style="background: var(--blanco); padding: 50px 0; text-align: center; border-top: 1px solid var(--borde);">
        <div class="contenedor">
            <h2 style="margin-bottom: 30px;">Nuestra Trayectoria en Cifras</h2>
            <div class="grid-3" style="gap: 50px;">
                <div>
                    <h3 style="font-size: 36px; margin: 0; color: var(--azul-claro);">15+</h3>
                    <p style="font-weight: 700;">Años de Experiencia</p>
                </div>
                <div>
                    <h3 style="font-size: 36px; margin: 0; color: var(--azul-claro);">98%</h3>
                    <p style="font-weight: 700;">Casos con Resolución Exitosa</p>
                </div>
                <div>
                    <h3 style="font-size: 36px; margin: 0; color: var(--azul-claro);">12</h3>
                    <p style="font-weight: 700;">Profesionales Adscritos</p>
                </div>
            </div>
        </div>
    </section>
@endsection