<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="{{ route('admin.courses.index') }}">Clases</a></li>
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