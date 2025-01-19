@extends("layouts.admin")
@section('title', 'Editar Curso')

@section("content")
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4">Editar Curso</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('course.update', $course->id) }}" method="post" class="p-4 border rounded shadow-sm bg-light">
                @csrf <!-- Token de seguridad en Laravel -->
                @method('PUT') <!-- Método PUT para la actualización -->

                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="name" class="form-label">Título del Curso</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $course->name) }}" 
                        placeholder="Escribe el título del curso">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="description" class="form-label">Descripción del Curso</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="3" 
                        placeholder="Escribe una breve descripción del curso">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Fecha de inicio -->
                <div class="mb-4">
                    <label for="start_date" class="form-label">Fecha de Inicio</label>
                    <input 
                        type="date" 
                        name="start_date" 
                        id="start_date" 
                        class="form-control @error('start_date') is-invalid @enderror" 
                        value="{{ old('start_date', $course->start_date) }}">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Fecha de fin -->
                <div class="mb-4">
                    <label for="end_date" class="form-label">Fecha de Fin</label>
                    <input 
                        type="date" 
                        name="end_date" 
                        id="end_date" 
                        class="form-control @error('end_date') is-invalid @enderror" 
                        value="{{ old('end_date', $course->end_date) }}">
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('course.index') }}" class="btn btn-secondary px-4 py-2">Atrás</a>
                    <button type="submit" class="btn btn-primary px-4 py-2">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
