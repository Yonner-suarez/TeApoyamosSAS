@extends('layouts.app')

@section('title', 'Nuestro Equipo de Profesionales')

@section('styles')
    <style>
        .equipo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 40px 0;
        }
        .profesional-card {
            background: var(--blanco);
            border-radius: 12px;
            box-shadow: var(--sombra);
            overflow: hidden; 
            text-align: center;
        }
        .profesional-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            filter: grayscale(80%);
            transition: filter 0.3s;
        }
        .profesional-card:hover img {
            filter: grayscale(0%);
        }
        .profesional-info {
            padding: 20px;
        }
        .profesional-info h3 {
            margin: 5px 0 5px;
            font-size: 22px;
            color: var(--azul-oscuro);
        }
        .profesional-info p {
            margin: 0;
            font-weight: 700;
            color: var(--azul-claro);
        }
        .profesional-info small {
            display: block;
            margin-top: 10px;
            color: var(--gris-texto);
        }
    </style>
@endsection

@section('content')
    <div class="contenedor">
        <h2 style="margin-top: 40px; text-align: center;">Nuestro Equipo de Profesionales</h2>
        <p style="text-align: center; max-width: 800px; margin: 10px auto 30px;">Conozca a los abogados especializados que lideran nuestras áreas de práctica y están listos para ofrecerle la mejor asesoría.</p>
        
        <section class="equipo-grid">
            <div class="profesional-card">
                <img src="{{ asset('img/abogado1.jpg') }}" alt="Foto de Laura Gómez">
                <div class="profesional-info">
                    <h3>Dra. Laura Gómez</h3>
                    <p>Derecho Corporativo</p>
                    <small>Ubicación: Bogotá - Lidera la gestión de cumplimiento.</small>
                    <a href="{{ route('contacto') }}" class="btn-cta" style="margin-top: 15px; padding: 8px 20px;">Ver Perfil</a>
                </div>
            </div>

            <div class="profesional-card">
                <img src="{{ asset('img/abogado2.jpg') }}" alt="Foto de Andrés Cárdenas">
                <div class="profesional-info">
                    <h3>Dr. Andrés Cárdenas</h3>
                    <p>Derecho Laboral</p>
                    <small>Ubicación: Medellín - Experto en litigios de RRHH.</small>
                    <a href="{{ route('contacto') }}" class="btn-cta" style="margin-top: 15px; padding: 8px 20px;">Ver Perfil</a>
                </div>
            </div>

            <div class="profesional-card">
                <img src="{{ asset('img/abogado3.jpg') }}" alt="Foto de Juliana Díaz">
                <div class="profesional-info">
                    <h3>Dra. Juliana Díaz</h3>
                    <p>Derecho Fiscal y Tributario</p>
                    <small>Ubicación: Cali - Especialista en planeación tributaria.</small>
                    <a href="{{ route('contacto') }}" class="btn-cta" style="margin-top: 15px; padding: 8px 20px;">Ver Perfil</a>
                </div>
            </div>
        </section>
    </div>
@endsection