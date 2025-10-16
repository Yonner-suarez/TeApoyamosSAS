@extends('layouts.app')

@section('title', 'Únete a Nuestro Equipo Legal')

@section('styles')
<style>
    :root {
        --primario: #003366;
        --secundario: #0066cc;
        --fondo: #f5f7fa;
        --blanco: #ffffff;
        --gris: #e9ecef;
        --texto: #333;
        --sombra: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    body {
        background-color: var(--fondo);
        font-family: "Segoe UI", Roboto, sans-serif;
        color: var(--texto);
    }

    .contenedor {
        padding: 40px 20px;
    }

    h2 {
        font-size: 2rem;
        color: var(--primario);
        margin-bottom: 10px;
    }

    p {
        color: #555;
        line-height: 1.6;
    }

    /* Caja del formulario */
    .registro-container {
        max-width: 700px;
        margin: 40px auto;
        background: var(--blanco);
        padding: 40px;
        border-radius: 12px;
        box-shadow: var(--sombra);
    }

    .registro-container h3 {
        color: var(--primario);
        margin-bottom: 20px;
        border-bottom: 2px solid var(--secundario);
        padding-bottom: 8px;
    }

    .registro-container label {
        display: block;
        font-weight: 600;
        margin-top: 20px;
        color: var(--primario);
    }

    .registro-container input,
    .registro-container select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--gris);
        border-radius: 6px;
        font-size: 1rem;
        margin-top: 5px;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .registro-container input:focus,
    .registro-container select:focus {
        outline: none;
        border-color: var(--secundario);
        box-shadow: 0 0 6px rgba(0, 102, 204, 0.3);
    }

    /* Aviso */
    .registro-container .aviso {
        padding: 15px;
        background-color: #fce7e7;
        border: 1px solid #f99;
        color: #c00;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    /* Botón CTA */
    .btn-cta {
        background-color: var(--secundario);
        color: var(--blanco);
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-cta:hover {
        background-color: var(--primario);
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .registro-container {
            padding: 25px;
        }

        h2 {
            font-size: 1.6rem;
        }
    }
</style>
@endsection

@include('components.register-modal')
@section('content')
<div class="contenedor">
      <div class="flex-center full-height">       
            <button class="btn-registrate" id="openModalBtn">Regístrate</button>        
    </div>
    <h2 style="text-align: center;">Únete a Nuestro Equipo Legal</h2>
    <p style="text-align: center; max-width: 800px; margin: 10px auto 30px;">
        Si eres un profesional apasionado por el marco legal corporativo y el apoyo estratégico, te invitamos a registrar tu hoja de vida para futuras oportunidades.
    </p>

    <div class="registro-container">
        <div class="aviso">
            <p><strong>Nota importante:</strong> Valoramos el cumplimiento de los lineamientos de seguridad. Los datos y documentos adjuntos serán tratados bajo estricta confidencialidad y solo con fines de evaluación de talento.</p>
        </div>
        
        <h3>Registro de Hoja de Vida</h3>
       
    </div>
</div>
@endsection
