<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around text-lg-start text-center" id="navbarNav">
      <ul class="navbar-nav gap-3 gap-lg-5"> <!-- Ajustamos los espacios -->
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('course.index') }}">Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Disabled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Prueba</a>
        </li>

        <!-- Si el usuario está autenticado -->
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Cerrar sesión</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
        <!-- Si el usuario no está autenticado -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
