<div class="admin">
    <div class="sidebar" id="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownToggle">
                    Clases
                </a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="{{ route('admin.courses.create') }}">Crear</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">Listado</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownToggle">
                    Alumnos
                </a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="{{ route('admin.student.create') }}">Crear</a></li>
                    <li><a href="{{ route('admin.student.index') }}">Listado</a></li>
                </ul>
            </li>
            </li>
            <li><a href="#">Talleres</a></li>
            <li><a href="#">Reseñas</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-logout">Panel Usuario</button>
                </form>
            </li>
        </ul>
    </div>
    <!-- Contenido principal -->
    <div class="content">
        <button class="toggle-button" id="toggleButton">&#9776;</button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("toggleButton");
        const sidebar = document.getElementById("sidebar");

        toggleButton.addEventListener("click", function() {
            sidebar.classList.toggle("active");
        });
    });
</script>