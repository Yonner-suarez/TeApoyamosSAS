<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Enviar Solicitud</h2>
        <form enctype="multipart/form-data">
            <label for="nombre">Nombre Completo:</label>
            <input id="nombre" type="text" placeholder="Nombre completo" required>

            <label for="correo">Correo Electrónico:</label>
            <input id="correo" type="email" placeholder="Correo electrónico" required>

            <label for="telefono">Teléfono:</label>
            <input id="telefono" type="tel" placeholder="Teléfono" required>

            <label for="experiencia">Experiencia Profesional y Habilidades:</label>
            <textarea id="experiencia" placeholder="Describe tu experiencia profesional y habilidades..." rows="4" required></textarea>

            <label for="hoja_vida">Adjuntar Hoja de Vida (PDF):</label>
            <input id="hoja_vida" type="file" accept=".pdf" required>

            <button type="submit" class="submit-btn">Enviar Solicitud</button>
        </form>
    </div>
</div>
