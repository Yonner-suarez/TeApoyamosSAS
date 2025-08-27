import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

function App() {
  return (
    <div className="d-flex flex-column min-vh-100">
      {/* Encabezado */}
      <header className="bg-dark text-white text-center py-5 shadow w-100">
        <h1 className="fw-bold">
          <i className="bi bi-clipboard-data me-2"></i>
          Actividad Académica
        </h1>
        <p className="lead">Análisis y diseño del problema</p>
      </header>

      {/* Cuerpo */}
      <main className="container-fluid my-5 flex-grow-1 w-100 px-5">
        {/* Paso 4 */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            <i className="bi bi-diagram-3 me-2"></i>
            Paso 4: Análisis del Problema Propuesto
          </h2>

          <div className="accordion" id="accordionPaso4">
            {/* Requerimientos funcionales */}
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingOne">
                <button
                  className="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  ✅ Requerimientos funcionales
                </button>
              </h2>
              <div
                id="collapseOne"
                className="accordion-collapse collapse show"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionPaso4"
              >
                <div className="accordion-body">
                  <ul>
                    <li>
                      Publicar información institucional sobre la firma,
                      servicios y trayectoria.
                    </li>
                    <li>
                      Registro de hojas de vida de aspirantes y validación de
                      las mismas.
                    </li>
                    <li>
                      Gestión de clientes y procesos legales con seguimiento de
                      avances.
                    </li>
                    <li>Gestión de usuarios con roles y permisos.</li>
                  </ul>
                </div>
              </div>
            </div>

            {/* Requerimientos no funcionales */}
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingTwo">
                <button
                  className="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  ⚙️ Requerimientos no funcionales
                </button>
              </h2>
              <div
                id="collapseTwo"
                className="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordionPaso4"
              >
                <div className="accordion-body">
                  <ul>
                    <li>
                      Seguridad de la información y encriptación de datos
                      sensibles.
                    </li>
                    <li>
                      Disponibilidad continua y acceso desde diferentes
                      dispositivos.
                    </li>
                    <li>
                      Interfaz intuitiva y adaptable a móviles y computadores.
                    </li>
                    <li>
                      Respaldos automáticos y escalabilidad de la aplicación.
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            {/* Actores */}
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingThree">
                <button
                  className="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  👥 Actores del sistema
                </button>
              </h2>
              <div
                id="collapseThree"
                className="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordionPaso4"
              >
                <div className="accordion-body">
                  <ul>
                    <li>Administrador del sistema</li>
                    <li>Profesionales de la firma</li>
                    <li>Aspirantes (profesionales externos)</li>
                    <li>Clientes</li>
                    <li>Público general</li>
                  </ul>
                </div>
              </div>
            </div>

            {/* Información a registrar */}
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingFour">
                <button
                  className="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseFour"
                >
                  📑 Información a registrar
                </button>
              </h2>
              <div
                id="collapseFour"
                className="accordion-collapse collapse"
                aria-labelledby="headingFour"
                data-bs-parent="#accordionPaso4"
              >
                <div className="accordion-body">
                  <ul>
                    <li>
                      Datos institucionales: misión, visión, trayectoria,
                      servicios, noticias y alianzas.
                    </li>
                    <li>
                      Datos de profesionales: nombre, especialidad, ubicación y
                      contacto.
                    </li>
                    <li>
                      Datos de aspirantes: formación, experiencia y hoja de vida
                      digital.
                    </li>
                    <li>
                      Datos de clientes: identificación, contacto y tipo de
                      proceso.
                    </li>
                    <li>
                      Procesos legales: número, tipo, cliente asociado, avances
                      y estado.
                    </li>
                    <li>Usuarios: credenciales, roles y permisos.</li>
                    <li>Mensajes recibidos en el formulario de contacto.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Paso 5 */}
        <section className="mb-5">
          <h2 className="mb-4 text-success border-bottom pb-2">
            <i className="bi bi-laptop me-2"></i>
            Paso 5: Frameworks y Librerías
          </h2>

          <div className="row g-4">
            <div className="col-md-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">React</h5>
                  <p className="card-text">
                    Librería de JavaScript para construir interfaces de usuario
                    dinámicas y modulares.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Bootstrap</h5>
                  <p className="card-text">
                    Framework CSS para diseño responsivo y componentes
                    prediseñados.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Tailwind CSS</h5>
                  <p className="card-text">
                    Framework de utilidades CSS para personalizar estilos de
                    manera rápida y eficiente.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Vite</h5>
                  <p className="card-text">
                    Herramienta de desarrollo rápida que permite ejecutar
                    proyectos con React y optimiza la compilación para
                    producción.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      {/* Pie de página */}
      <footer className="bg-dark text-white text-center py-4 mt-auto w-100">
        <p className="mb-0">
          &copy; {new Date().getFullYear()} Actividad Académica | Yonner Suárez
          v1.0.5
        </p>
      </footer>
    </div>
  );
}

export default App;
