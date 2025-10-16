@extends('layouts.app')

@section('title', 'Quiénes Somos')

@section('content')
    <div class="contenedor">
        <h2 style="margin-top: 40px; text-align: center;">Trayectoria, Visión y Compromiso</h2>
        
        <section style="background: var(--blanco); padding: 30px; border-radius: 8px; box-shadow: var(--sombra); margin-top: 30px;">
            <p style="font-size: 1.1rem;">La firma de abogados **“Te apoyamos SAS”** se fundó bajo el principio de que el marco legal debe ser un **facilitador estratégico**, no un obstáculo, para el desarrollo y desempeño correcto de cualquier organización. Estamos conformados por un equipo de profesionales de alto nivel, disponibles para brindar **asesoría legal proactiva** y apoyo esencial en la toma de decisiones.</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 40px; padding-top: 20px; border-top: 1px dashed var(--borde);">
                <div>
                    <h3>Misión</h3>
                    <p>Brindar soluciones legales integrales y éticas, enfocadas en minimizar riesgos y maximizar el cumplimiento normativo para garantizar la sostenibilidad y el crecimiento de nuestros clientes corporativos.</p>
                </div>
                <div>
                    <h3>Visión</h3>
                    <p>Ser reconocidos como la firma líder a nivel nacional en asesoría legal estratégica para entornos profesionales, destacando por nuestra excelencia, innovación y compromiso con el éxito de cada organización que representamos.</p>
                </div>
            </div>
        </section>

        <section style="margin-top: 50px; text-align: center;">
            <h2 style="margin-bottom: 30px;">Reconocimientos y Alianzas Estratégicas</h2>
            <div style="display: flex; justify-content: space-around; align-items: center; background: var(--blanco); padding: 20px; border-radius: 8px; box-shadow: var(--sombra);">
                <span style="font-size: 1.1rem; font-weight: 700;">Cámara de Comercio</span>
                <span style="font-size: 1.1rem; font-weight: 700;">Gremio Corporativo X</span>
                <span style="font-size: 1.1rem; font-weight: 700; color: var(--azul-claro);">LegalTech Partners</span>
            </div>
        </section>
    </div>
@endsection