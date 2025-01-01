@extends("layouts.admin")
@section('title', 'Alumnos')

@section("content")
<div class="content">
    <div class="form_course">
        <form action="{{ route('student.store') }}" method="post" class="formulario_curso">
            @csrf <!-- Token de seguridad en Laravel -->

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="form-label">Nombre del alumno</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Campo Apellidos -->
            <div class="mb-4">
                <label for="surname" class="form-label">Apellidos del alumno</label>
                <input type="text" name="surname" id="surname" class="form-control">
            </div>

            <!-- Campo Dirección -->
            <div class="mb-4">
                <label for="address" class="form-label">Dirección del alumno</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <!-- Campo Fecha Nacimiento -->
            <div class="mb-4">
                <label for="date_of_birth" class="form-label">Fecha del nacimiento de alumno</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
            </div>

            <!-- Botón de enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Inscribir alumno</button>
            </div>
        </form>
    </div>
</div>
@endsection