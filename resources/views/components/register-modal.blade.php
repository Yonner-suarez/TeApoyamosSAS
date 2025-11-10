<div 
    id="registerModal" 
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300"
>
    <div class="bg-white w-full max-w-lg max-h-[90vh] overflow-y-auto rounded-2xl shadow-xl p-8 relative">


        <!-- Botón cerrar -->
        <button 
            id="closeModalBtn" 
            class="absolute top-4 right-4 text-2xl font-bold text-gray-600 hover:text-red-600 transition"
        >
            &times;
        </button>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-[#003366] mb-6 border-b-2 border-[#0066cc] pb-2">
            Enviar Solicitud
        </h2>

        <form enctype="multipart/form-data" class="space-y-5">

            <!-- Nombre -->
            <div>
                <label for="nombre" class="font-semibold text-[#003366]">Nombre Completo:</label>
                <input 
                    id="nombre" 
                    type="text" 
                    placeholder="Nombre completo" 
                    required
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0066cc] focus:border-[#0066cc] outline-none"
                >
            </div>

            <!-- Correo -->
            <div>
                <label for="correo" class="font-semibold text-[#003366]">Correo Electrónico:</label>
                <input 
                    id="correo" 
                    type="email" 
                    placeholder="Correo electrónico" 
                    required
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0066cc] focus:border-[#0066cc] outline-none"
                >
            </div>

            <!-- Teléfono -->
            <div>
                <label for="telefono" class="font-semibold text-[#003366]">Teléfono:</label>
                <input 
                    id="telefono" 
                    type="tel" 
                    placeholder="Teléfono" 
                    required
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0066cc] focus:border-[#0066cc] outline-none"
                >
            </div>

            <!-- Experiencia -->
            <div>
                <label for="experiencia" class="font-semibold text-[#003366]">
                    Experiencia Profesional y Habilidades:
                </label>
                <textarea 
                    id="experiencia" 
                    placeholder="Describe tu experiencia profesional y habilidades..." 
                    rows="4" 
                    required
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0066cc] focus:border-[#0066cc] outline-none"
                ></textarea>
            </div>

            <!-- Hoja de Vida -->
            <div>
                <label for="hoja_vida" class="font-semibold text-[#003366]">
                    Adjuntar Hoja de Vida (PDF):
                </label>
                <input 
                    id="hoja_vida" 
                    type="file" 
                    accept=".pdf" 
                    required
                    class="mt-1 w-full border border-gray-300 p-2 rounded-lg bg-gray-50 cursor-pointer focus:ring-2 focus:ring-[#0066cc] focus:border-[#0066cc]"
                >
            </div>

            <!-- Botón enviar -->
            <button 
                type="submit" 
                class="w-full bg-[#0066cc] text-white font-semibold py-3 rounded-xl shadow-md hover:bg-[#003366] transition-all"
            >
                Enviar Solicitud
            </button>

        </form>
    </div>
</div>
