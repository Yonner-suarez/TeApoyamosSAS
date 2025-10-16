@extends('layouts.app')

@section('title', 'Contacto y Asesoría')

@section('styles')
    <style>
        .contacto-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            padding: 40px 0;
        }
        .formulario-contacto, .info-contacto {
            background: var(--blanco);
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--sombra);
        }
        @media (max-width: 900px) {
            .contacto-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <div class="contenedor">
        <h2 style="margin-top: 40px; text-align: center;">Contáctenos: Asesoría a un Clic</h2>
        
        <section class="contacto-grid">
            <div class="formulario-contacto">
                <h3>Solicite una Consulta Legal</h3>
                <form action="{{ route('contacto.submit') }}" method="POST">
                    @csrf {{-- ¡Obligatorio en Laravel! --}}
                    
                    <label for="nombre">Nombre Completo *</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Juan Pérez" required>
                    
                    <label for="correo">Correo Electrónico *</label>
                    <input type="email" id="correo" name="correo" placeholder="su.correo@organizacion.com" required>
                    
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="(+57) XXX XXX XXXX">
                    
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" placeholder="Consulta sobre Derecho Corporativo">

                    <label for="mensaje">Describa brevemente su necesidad legal *</label>
                    <textarea id="mensaje" name="mensaje" required></textarea>
                    
                    <button type="submit" class="btn-cta" style="width: 100%; margin-top: 20px;">Enviar Consulta</button>
                </form>
            </div>

            <div class="info-contacto">
                <h3>Nuestros Datos de Contacto</h3>
                <p style="font-weight: 700; color: var(--azul-claro);">Teléfono Principal:</p>
                <p style="font-size: 1.2rem;">(+57) 601 XXX XXXX</p>
                
                <p style="font-weight: 700; color: var(--azul-claro);">Correo General:</p>
                <p style="font-size: 1.2rem;">info@teapoyamos.com</p>

                <div class="ubicaciones">
                    <h3>Ubicación Nacional</h3>
                    <div>
                        <p style="font-weight: 700;">Oficina Central (Bogotá)</p>
                        <p>Carrera 7 # 72 - 80, Piso 5.</p>
                    </div>
                    <div>
                        <p style="font-weight: 700;">Oficina Regional (Medellín)</p>
                        <p>Calle 10 # 35-10, El Poblado.</p>
                    </div>
                    <p style="font-size: 0.9rem; color: #6c757d;">*Atendemos en todo el territorio nacional vía virtual.</p>
                </div>
            </div>
        </section>
    </div>
@endsection