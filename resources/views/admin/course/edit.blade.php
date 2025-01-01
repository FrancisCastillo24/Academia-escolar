@extends("layouts.admin")
@section('title', 'Cursos')

@section("content")
<div class="content">
    <div class="form_course">
        <form action="{{ route('course.update', $course->id) }}" method="post" class="formulario_curso">
            @csrf <!-- Token de seguridad en Laravel -->
            @method('PUT') <!-- Método PUT para la actualización -->

            <!-- Campo Título -->
            <div class="mb-4">
                <label for="name" class="form-label">Título del curso</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name) }}">
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="course_description" class="form-label">Descripción del curso</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('course_description', $course->description) }}">
            </div>

            <!-- Campo Fecha de inicio -->
            <div class="mb-4">
                <label for="start_date" class="form-label">Fecha de inicio</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $course->start_date) }}">
            </div>

            <!-- Campo Fecha de fin -->
            <div class="mb-4">
                <label for="start_end" class="form-label">Fecha de fin</label>
                <input type="date" name="start_end" id="start_end" class="form-control" value="{{ old('start_end', $course->start_end) }}">
            </div>

            <!-- Botón de enviar -->
            <div class="text-center">
                <a href="{{ route('course.index') }}" class="btn btn-secondary px-4 py-2">Atrás</a>
                <button type="submit" class="btn btn-primary px-4 py-2">Modificar</button>
            </div>
        </form>
    </div>
</div>
@endsection
