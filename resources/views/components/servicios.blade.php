  @extends('layouts.app')

  @section('title', 'Servicios y Áreas de Práctica')

  @section('content')
      <div class="contenedor">
          <h2 style="margin-top: 40px; text-align: center;">Nuestras Áreas de Práctica Legal</h2>
          <p style="text-align: center; max-width: 800px; margin: 10px auto 30px;">Ofrecemos soluciones legales especializadas para la protección y el crecimiento estratégico de su organización en un marco de cumplimiento estricto.</p>
          
          <section class="grid-3">
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">🏢</span>
                  <h3>Derecho Corporativo y Societario</h3>
                  <p>Asesoría en la estructuración, modificación y disolución de sociedades. Elaboración y revisión de estatutos, actas y contratos comerciales complejos.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">⚖️</span>
                  <h3>Relaciones Laborales y RRHH</h3>
                  <p>Manejo de litigios, contratos de trabajo, reglamentos internos y procesos disciplinarios. Garantizamos el cumplimiento de la normativa vigente.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">💡</span>
                  <h3>Propiedad Intelectual y Tecnología</h3>
                  <p>Registro y protección de marcas, patentes y derechos de autor. Asesoría en contratos tecnológicos y cumplimiento de normativas de datos.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">✅</span>
                  <h3>Compliance y Gestión de Riesgos</h3>
                  <p>Desarrollo e implementación de programas de *Compliance* para prevenir delitos corporativos y asegurar la ética empresarial.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">💰</span>
                  <h3>Asesoría Fiscal y Tributaria</h3>
                  <p>Planeación tributaria, gestión de impuestos corporativos y representación en procesos administrativos ante entidades de control fiscal.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
              <div class="tarjeta" style="text-align: left;">
                  <span class="tarjeta-icono">📜</span>
                  <h3>Contratación con el Estado</h3>
                  <p>Soporte en licitaciones, pliegos y ejecución de contratos con entidades públicas, garantizando la transparencia y legalidad del proceso.</p>
                  <a href="{{ route('contacto') }}" style="color:var(--azul-claro); font-size: 0.9rem;">Solicitar Servicio</a>
              </div>
          </section>

          <section style="text-align: center; margin-top: 50px; background: var(--blanco); padding: 40px; border-radius: 8px;">
              <h3 style="margin: 0;">¿Necesita una solución que no ve aquí?</h3>
              <p>Contáctenos y evaluaremos su caso específico con el profesional idóneo.</p>
              <a href="{{ route('contacto') }}" class="btn-cta">Hable con un Abogado</a>
          </section>
      </div>
  @endsection