  @extends('layouts.app')

  @section('title', 'Contacto y Asesoría')

  @section('content')

  <div class="max-w-6xl mx-auto px-4 py-12">

      {{-- Título principal --}}
      <h2 class="text-3xl font-bold text-[#003366] text-center mb-12">
          Contáctenos: Asesoría a un Clic
      </h2>

      {{-- GRID PRINCIPAL --}}
      <section class="grid grid-cols-1 lg:grid-cols-3 gap-10">

          {{-- FORMULARIO (ocupa 2 columnas en escritorio) --}}
          <div class="lg:col-span-2 bg-white shadow-lg rounded-2xl p-8">

              <h3 class="text-xl font-bold text-[#003366] border-b-2 border-[#0066cc] pb-2 mb-6">
                  Solicite una Consulta Legal
              </h3>

              <form id="contactoForm" class="space-y-5">
                  @csrf

                  {{-- Nombre --}}
                  <div>
                      <label for="nombre" class="font-semibold text-[#003366]">Nombre Completo *</label>
                      <input 
                          type="text" 
                          id="nombre" 
                          name="nombre" 
                          placeholder="Juan Pérez"
                          required
                          class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:border-[#0066cc] focus:ring-2 focus:ring-[#0066cc] outline-none"
                      >
                  </div>

                  {{-- Correo --}}
                  <div>
                      <label for="correo" class="font-semibold text-[#003366]">Correo Electrónico *</label>
                      <input 
                          type="email" 
                          id="correo" 
                          name="correo" 
                          placeholder="su.correo@organizacion.com"
                          required
                          class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:border-[#0066cc] focus:ring-2 focus:ring-[#0066cc] outline-none"
                      >
                  </div>

                  {{-- Teléfono --}}
                  <div>
                      <label for="telefono" class="font-semibold text-[#003366]">Teléfono</label>
                      <input 
                          type="text" 
                          id="telefono" 
                          name="telefono" 
                          placeholder="(+57) XXX XXX XXXX"
                          class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:border-[#0066cc] focus:ring-2 focus:ring-[#0066cc] outline-none"
                      >
                  </div>

                  {{-- Asunto --}}
                  <div>
                      <label for="asunto" class="font-semibold text-[#003366]">Asunto</label>
                      <input 
                          type="text" 
                          id="asunto" 
                          name="asunto" 
                          placeholder="Consulta sobre Derecho Corporativo"
                          class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:border-[#0066cc] focus:ring-2 focus:ring-[#0066cc] outline-none"
                      >
                  </div>

                  {{-- Mensaje --}}
                  <div>
                      <label for="mensaje" class="font-semibold text-[#003366]">
                          Describa brevemente su necesidad legal *
                      </label>
                      <textarea 
                          id="mensaje" 
                          name="mensaje" 
                          rows="4"
                          required
                          class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:border-[#0066cc] focus:ring-2 focus:ring-[#0066cc] outline-none"
                      ></textarea>
                  </div>

                  {{-- Botón --}}
                  <button 
                      type="submit" 
                      class="w-full bg-[#0066cc] text-white font-semibold py-3 rounded-xl shadow-md hover:bg-[#003366] transition-all"
                  >
                      Enviar Consulta
                  </button>
              </form>
          </div>

          {{-- INFORMACIÓN DE CONTACTO --}}
          <div class="bg-white shadow-lg rounded-2xl p-8">

              <h3 class="text-xl font-bold text-[#003366] border-b-2 border-[#0066cc] pb-2 mb-6">
                  Nuestros Datos de Contacto
              </h3>

              {{-- Teléfono --}}
              <p class="font-semibold text-[#0066cc]">Teléfono Principal:</p>
              <p class="text-lg mb-4">(+57) 601 XXX XXXX</p>

              {{-- Correo --}}
              <p class="font-semibold text-[#0066cc]">Correo General:</p>
              <p class="text-lg mb-6">info@teapoyamos.com</p>

              {{-- Ubicaciones --}}
              <h3 class="text-xl font-bold text-[#003366] border-b-2 border-[#0066cc] pb-2 mb-4">
                  Ubicación Nacional
              </h3>

              <div class="space-y-4">
                  <div>
                      <p class="font-semibold">Oficina Central (Bogotá)</p>
                      <p>Carrera 7 # 72 - 80, Piso 5.</p>
                  </div>

                  <div>
                      <p class="font-semibold">Oficina Regional (Medellín)</p>
                      <p>Calle 10 # 35-10, El Poblado.</p>
                  </div>
              </div>

              <p class="text-sm text-gray-500 mt-6">
                  * Atendemos en todo el territorio nacional vía virtual.
              </p>
          </div>

      </section>

  </div>

  {{-- SWEET ALERT --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('contactoForm');

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // evita recargar

        const formData = new FormData(form);

        try {
            const response = await fetch('/api/contacto/solicitud', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === true) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Enviado!',
                    text: data.message,
                    confirmButtonColor: '#0066cc'
                });

                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message,
                });
            }

        } catch (error) {
            console.error("ERROR FETCH:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error de conexión',
                text: 'No se pudo enviar la solicitud.',
            });
        }
    });

});
</script>


  @endsection
