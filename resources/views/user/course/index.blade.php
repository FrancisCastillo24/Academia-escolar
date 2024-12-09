@extends("layouts.main")
@section('title', 'Cursos')

@section("content")
@if (session('success'))
<div id="success-message" style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px; text-align: center">
    {{ session('success') }}
</div>
@endif

<!-- Información sobre la tabla -->
<br><div class="container alert-info" style="border: 1px solid #d1ecf1; background-color: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    <strong>Información:</strong> A continuación, podrás ver una tabla con los cursos disponibles. Cada curso incluye información sobre su nombre, descripción, fecha de inicio y fecha de finalización.
</div>


<!-- Tabla de cursos -->
<table class="container table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalización</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->start_date }}</td>
            <td>{{ $course->start_end }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No hay cursos disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Sección con iconos y descripción de los cursos -->
<section class="container mt-5">
    <div class="row text-center d-flex" style="justify-content: space-between;">
        <!-- Card for Mathematics -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-calculator"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Matemáticas</h4>
                    <p class="card-text" style="color: #666;">Matemáticas para Primaria, ESO, Bachillerato y Universidad. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

        <!-- Card for Chemistry -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-flask"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Química</h4>
                    <p class="card-text" style="color: #666;">Química para ESO, Bachillerato y Universidad. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

        <!-- Card for Social Sciences -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-globe"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Ciencias Sociales</h4>
                    <p class="card-text" style="color: #666;">Ciencias Sociales para Primaria, ESO y Bachillerato. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

        <!-- Card for Physics -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-asterisk"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Física</h4>
                    <p class="card-text" style="color: #666;">Física para ESO, Bachillerato y Universidad. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

        <!-- Card for Language -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Lengua</h4>
                    <p class="card-text" style="color: #666;">Lengua y Literatura para Primaria, ESO y Bachillerato. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

        <!-- Card for English -->
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-sm" style="background-color: #f4f4f9; border-radius: 10px; display: flex; flex-direction: column; min-height: 100%;">
                <div class="card-body" style="flex-grow: 1;">
                    <div class="icon" style="font-size: 50px; color: #f57c00;">
                        <i class="bi bi-flag"></i>
                    </div>
                    <h4 class="card-title" style="color: #333; font-family: 'Arial', sans-serif;">Acceso Grado Superior</h4>
                    <p class="card-text" style="color: #666;">Prepara tu futuro profesional con el curso de Acceso a Grado Superior. Te preparamos con total seguridad</p>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

<script>
    // Verifica si el mensaje existe y luego lo oculta después de 3 segundos
    window.onload = function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 6000); // El mensaje desaparecerá después de 3000 ms (3 segundos)
        }
    };
</script>
