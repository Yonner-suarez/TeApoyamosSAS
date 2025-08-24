import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  return (
    <div>
      {/* Encabezado */}
      <header className="bg-dark text-white text-center py-5 shadow">
        <h1 className="fw-bold">Firma de Abogados Te Apoyamos SAS</h1>
        <p className="lead">
          Asesoría legal con trayectoria, confianza y compromiso
        </p>
      </header>

      {/* Cuerpo */}
      <main className="container my-5">
        {/* Sobre Nosotros */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            Sobre Nosotros
          </h2>
          <p className="fs-5 text-muted">
            Somos un equipo de profesionales especializados en brindar asesoría
            legal y acompañamiento en la toma de decisiones en entornos
            profesionales. Nuestro compromiso es ofrecer soluciones jurídicas
            con respaldo, seguridad y ética profesional.
          </p>
        </section>

        {/* Servicios */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">Servicios</h2>
          <div className="row">
            <div className="col-md-4 mb-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Asesoría Legal</h5>
                  <p className="card-text">
                    Brindamos orientación en diversas áreas del derecho para
                    garantizar decisiones informadas.
                  </p>
                </div>
              </div>
            </div>
            <div className="col-md-4 mb-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Acompañamiento Jurídico</h5>
                  <p className="card-text">
                    Asistimos en procesos legales, asegurando representación y
                    apoyo profesional.
                  </p>
                </div>
              </div>
            </div>
            <div className="col-md-4 mb-3">
              <div className="card shadow-sm h-100">
                <div className="card-body">
                  <h5 className="card-title">Noticias Legales</h5>
                  <p className="card-text">
                    Mantente actualizado con novedades y cambios normativos
                    relevantes.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Registro de Profesionales */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            Trabaja con Nosotros
          </h2>
          <p className="text-muted">
            Si deseas unirte a nuestro equipo, registra tu hoja de vida:
          </p>
          <form className="p-4 border rounded shadow-sm bg-light">
            <div className="mb-3">
              <label htmlFor="nombre" className="form-label fw-semibold">
                Nombre completo
              </label>
              <input
                type="text"
                className="form-control"
                id="nombre"
                placeholder="Ingresa tu nombre"
              />
            </div>
            <div className="mb-3">
              <label htmlFor="email" className="form-label fw-semibold">
                Correo electrónico
              </label>
              <input
                type="email"
                className="form-control"
                id="email"
                placeholder="ejemplo@email.com"
              />
            </div>
            <div className="mb-3">
              <label htmlFor="archivo" className="form-label fw-semibold">
                Hoja de vida (PDF)
              </label>
              <input type="file" className="form-control" id="archivo" />
            </div>
            <button type="submit" className="btn btn-primary w-100">
              Enviar
            </button>
          </form>
        </section>

        {/* Gestión de Procesos */}
        <section className="mb-5">
          <h2 className="mb-4 text-primary border-bottom pb-2">
            Gestión de Procesos
          </h2>
          <p className="text-muted">
            En esta sección los abogados pueden registrar la información de los
            clientes, el tipo de proceso y sus avances, garantizando
            organización y transparencia.
          </p>
          <div className="table-responsive shadow-sm">
            <table className="table table-hover align-middle">
              <thead className="table-dark">
                <tr>
                  <th>Cliente</th>
                  <th>Tipo de Proceso</th>
                  <th>Avances</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Juan Pérez</td>
                  <td>Laboral</td>
                  <td>Audiencia inicial realizada</td>
                </tr>
                <tr>
                  <td>María Gómez</td>
                  <td>Comercial</td>
                  <td>Contrato en revisión</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>

      {/* Pie de página */}
      <footer className="bg-dark text-white text-center py-4 mt-auto">
        <p className="mb-0">
          &copy; {new Date().getFullYear()} Te Apoyamos SAS. Todos los derechos
          reservados.
        </p>
      </footer>
    </div>
  );
}

export default App;
