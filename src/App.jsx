import "bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";

function App() {
  return (
    <div className="d-flex flex-column min-vh-100">
      {/* Encabezado */}
      <header className="bg-dark text-white text-center py-5 shadow w-100">
        <h1 className="fw-bold">
          <i className="bi bi-clipboard-data me-2"></i>
          Análisis del Problema y Herramientas Web
        </h1>
        <p className="lead">Actividad - Pasos 4 y 5</p>
      </header>

      {/* Cuerpo */}
      <main className="container my-5 flex-grow-1 w-100">
        {/* Paso 4 */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            <i className="bi bi-search me-2"></i>
            Paso 4: Análisis del Problema Propuesto
          </h2>
          <div className="card shadow-sm p-4 mb-4">
            <h5 className="text-secondary">
              ✅ Requerimientos de la solución web
            </h5>
            <ul className="list-group list-group-flush">
              <li className="list-group-item">
                Espacio informativo sobre la firma, servicios y noticias
                legales.
              </li>
              <li className="list-group-item">
                Módulo para registro y evaluación de hojas de vida de
                profesionales.
              </li>
              <li className="list-group-item">
                Gestión de procesos legales (datos del cliente, tipo de proceso
                y avances).
              </li>
              <li className="list-group-item">
                Seguridad de la información y respaldo de datos.
              </li>
            </ul>
          </div>
        </section>

        {/* Paso 5 */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            <i className="bi bi-tools me-2"></i>
            Paso 5: Herramientas y Frameworks para Desarrollo Web
          </h2>
          <div className="row">
            <div className="col-md-6 mb-3">
              <div className="card h-100 shadow-sm">
                <div className="card-body">
                  <h5 className="card-title">
                    <i className="bi bi-code-slash me-2"></i>
                    React.js
                  </h5>
                  <p className="card-text">
                    Librería de JavaScript para construir interfaces
                    interactivas y dinámicas.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-6 mb-3">
              <div className="card h-100 shadow-sm">
                <div className="card-body">
                  <h5 className="card-title">
                    <i className="bi bi-layers me-2"></i>
                    Bootstrap
                  </h5>
                  <p className="card-text">
                    Framework CSS que permite diseño responsive de manera rápida
                    y sencilla.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-6 mb-3">
              <div className="card h-100 shadow-sm">
                <div className="card-body">
                  <h5 className="card-title">
                    <i className="bi bi-palette me-2"></i>
                    Tailwind CSS
                  </h5>
                  <p className="card-text">
                    Framework de utilidades CSS que facilita la personalización
                    del diseño.
                  </p>
                </div>
              </div>
            </div>

            <div className="col-md-6 mb-3">
              <div className="card h-100 shadow-sm">
                <div className="card-body">
                  <h5 className="card-title">
                    <i className="bi bi-lightning-charge me-2"></i>
                    Vite
                  </h5>
                  <p className="card-text">
                    Herramienta de desarrollo rápido con React y otros
                    frameworks.
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
          &copy; {new Date().getFullYear()} Actividad Académica - Pasos 4 y 5
          Yonner Suárez
        </p>
      </footer>
    </div>
  );
}

export default App;
