<div class="admin">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownToggle">
                    Clases
                    <i class="arrow"></i> <!-- Esta flecha solo está en el menú principal -->
                </a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="{{ route('admin.courses.index') }}">Crear</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">Modificar</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">Eliminar</a></li>
                </ul>
            </li>
            <li><a href="#">Alumnos</a></li>
            <li><a href="#">Talleres</a></li>
            <li><a href="#">Reseñas</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Panel Usuario</button>
                </form>
            </li>
        </ul>
    </div>
</div>
