@extends('layouts.app')

@section('title', 'Únete a Nuestro Equipo Legal')

@section('styles')
    <style>
        .registro-container {
            max-width: 700px;
            margin: 40px auto;
            background: var(--blanco);
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--sombra);
        }
        .registro-container .aviso {
            padding: 15px;
            background-color: #fce7e7;
            border: 1px solid #f99;
            color: #c00;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')
    <div class="contenedor">
        <h2 style="margin-top: 40px; text-align: center;">Únete a Nuestro Equipo Legal</h2>
        <p style="text-align: center; max-width: 800px; margin: 10px auto 30px;">Si eres un profesional apasionado por el marco legal corporativo y el apoyo estratégico, te invitamos a registrar tu hoja de vida para futuras oportunidades.</p>

        <div class="registro-container">
            <div class="aviso">
                <p><strong>Nota importante:</strong> Valoramos el cumplimiento de los lineamientos de seguridad. Los datos y documentos adjuntos serán tratados bajo estricta confidencialidad y solo con fines de evaluación de talento.</p>
            </div>
            
            <h3>Registro de Hoja de Vida</h3>
            <form action="{{ route('trabaja.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- ¡Obligatorio en Laravel! --}}

                <label for="nombre">Nombre Completo *</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="email">Correo Electrónico *</label>
                <input type="email" id="email" name="email" required>
                
                <label for="telefono">Teléfono de Contacto</label>
                <input type="tel" id="telefono" name="telefono">

                <label for="especialidad">Área de Especialidad *</label>
                <select id="especialidad" name="especialidad" required>
                    <option value="">-- Selecciona una opción --</option>
                    <option value="Corporativo">Derecho Corporativo</option>
                    <option value="Laboral">Derecho Laboral</option>
                    <option value="Fiscal">Derecho Fiscal y Tributario</option>
                    <option value="Compliance">Compliance y Riesgos</option>
                    <option value="PropiedadIntelectual">Propiedad Intelectual</option>
                    <option value="Otra">Otra</option>
                </select>

                <label for="archivo_hv">Adjuntar Hoja de Vida (Máx. 2MB, PDF) *</label>
                <input type="file" id="archivo_hv" name="archivo_hv" accept=".pdf" required>
                
                <button type="submit" class="btn-cta" style="width: 100%; margin-top: 30px;">Enviar Postulación</button>
            </form>
        </div>
    </div>
@endsection