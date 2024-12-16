@extends("layouts.admin")
@section('title', 'Cursos')

@section("content")
<div class="content">
    <div class="form_course">
        <form action="{{ route('course.store') }}" method="post" class="formulario_curso">
            @csrf <!-- Token de seguridad en Laravel -->

            <!-- Campo Título -->
            <div class="mb-4">
                <label for="name" class="form-label">Título del curso</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="course_description" class="form-label">Descripción del curso</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <!-- Campo Fecha de inicio -->
            <div class="mb-4">
                <label for="start_date" class="form-label">Fecha de inicio</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <!-- Campo Fecha de fin -->
            <div class="mb-4">
                <label for="start_end" class="form-label">Fecha de fin</label>
                <input type="date" name="start_end" id="start_end" class="form-control" required>
            </div>

            <!-- Botón de enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Crear Curso</button>
            </div>
        </form>
    </div>
</div>
@endsection
