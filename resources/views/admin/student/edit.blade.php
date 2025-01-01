@extends("layouts.admin")
@section('title', 'Student')

@section("content")
<div class="content">
    <div class="form_course">
        <form action="{{ route('student.update', $student->id) }}" method="post" class="formulario_curso">
            @csrf <!-- Token de seguridad en Laravel -->
            @method('PUT') <!-- Método PUT para la actualización -->

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="form-label">Nombre del alumno</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}">
            </div>

            <!-- Campo Apellidos -->
            <div class="mb-4">
                <label for="surname" class="form-label">Apellidos del alumno</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $student->surname) }}">
            </div>

            <!-- Campo Dirección -->
            <div class="mb-4">
                <label for="address" class="form-label">Dirección del alumno</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $student->address) }}">
            </div>

            <!-- Campo Fecha Nacimiento -->
            <div class="mb-4">
                <label for="date_of_birth" class="form-label">Fecha de nacimiento del alumno</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $student->date_of_birth) }}">
            </div>

            <!-- Botón de enviar -->
            <div class="text-center">
                <a href="{{ route('student.index') }}" class="btn btn-secondary px-4 py-2">Atrás</a>
                <button type="submit" class="btn btn-primary px-4 py-2">Modificar</button>
            </div>
        </form>
    </div>
</div>
@endsection
