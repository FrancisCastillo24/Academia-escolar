@extends("layouts.admin")
@section('title', 'Editar Curso')

@section("content")
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4">Editar Alumno</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('student.update', $student->id) }}" method="post" class="p-4 border rounded shadow-sm bg-light">
                @csrf <!-- Token de seguridad en Laravel -->
                @method('PUT') <!-- Método PUT para la actualización -->

                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="name" class="form-label">Nombre del alumno</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $student->name) }}"
                        placeholder="Escribe el nombre del alumno">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="surname" class="form-label">Apellidos del alumno</label>
                    <textarea
                        name="surname"
                        id="surname"
                        class="form-control @error('surname') is-invalid @enderror"
                        rows="3"
                        placeholder="Escribe los apellidos del alumno">{{ old('surname', $student->surname) }}</textarea>
                    @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Fecha de fin -->
                <div class="mb-4">
                    <label for="address" class="form-label">Dirección del alumno</label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address', $student->address) }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Fecha de inicio -->
                <div class="mb-4">
                    <label for="date_of_birth" class="form-label">Fecha de nacimiento del alumno</label>
                    <input
                        type="date"
                        name="date_of_birth"
                        id="date_of_birth"
                        class="form-control @error('date_of_birth') is-invalid @enderror"
                        value="{{ old('date_of_birth', $student->date_of_birth) }}">
                    @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('student.index') }}" class="btn btn-secondary px-4 py-2">Atrás</a>
                    <button type="submit" class="btn btn-primary px-4 py-2">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection