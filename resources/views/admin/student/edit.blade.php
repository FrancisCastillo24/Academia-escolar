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

                <!-- Campo Nombre -->
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

                <!-- Campo Apellidos -->
                <div class="mb-4">
                    <label for="surname" class="form-label">Apellidos del alumno</label>
                    <input
                        name="surname"
                        id="surname"
                        class="form-control @error('surname') is-invalid @enderror"
                        value="{{ old('surname', $student->surname) }}"
                        placeholder="Escribe los apellidos del alumno">
                    @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div class="mb-4">
                    <label for="address" class="form-label">Email del alumno</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('address', $student->email) }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Dirección -->
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

                <!-- Campo Fecha de nacimiento -->
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

                <!-- Campo Teléfono -->
                <div class="mb-4">
                    <label for="phone" class="form-label">Dirección del alumno</label>
                    <input
                        type="number"
                        name="phone"
                        id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $student->phone) }}">
                    @error('phone')
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