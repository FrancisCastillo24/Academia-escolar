<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Botón del menú móvil -->
    <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú principal -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Utilizamos clases específicas para centrar solo en móviles -->
      <ul class="navbar-nav w-100 d-lg-flex justify-content-lg-end align-items-lg-center flex-column flex-lg-row text-lg-start text-center">
        <!-- Enlaces principales -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.courses.index') }}">Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.student.index') }}">Alumnos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Talleres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reseñas</a>
        </li>

        <!-- Menú desplegable -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi Cuenta
          </a>
          <ul class="dropdown-menu text-center" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
