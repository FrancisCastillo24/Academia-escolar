@extends("layouts.admin")
@section('title', 'Alumnos')

@section("content")
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-header text-center bg-primary text-white">
                <h4>Formulario de Inscripción</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('student.store') }}">
                @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del nuevo alumno" required>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Apellidos del nuevo alumno" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Dirección del nuevo alumno" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary px-4 py-2 mt-3 w-100">Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection


