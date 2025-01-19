@extends("layouts.admin")

@section('title', 'Cursos')

@section("content")
<div class="container mt-5">
    <h1 class="mb-4 text-center">Gestión de Cursos</h1>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @elseif(session('danger'))
    <div class="alert alert-success">
        <strong>¡Éxito!</strong> {{ session('danger') }}
    </div>
    @endif

    <!-- Tabla de cursos -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha de Finalización</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
            <tr>
                <td class="text-center" data-label="Código">{{ $course->id }}</td>
                <td class="text-center" data-label="Nombre">{{ $course->name }}</td>
                <td class="text-center" data-label="Descripción">{{ $course->description }}</td>
                <td class="text-center" data-label="Fecha de Inicio">{{ $course->start_date }}</td>
                <td class="text-center" data-label="Fecha de Finalización">{{ $course->end_date }}</td>
                <td class="text-center" data-label="Acciones">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este curso?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No hay cursos disponibles</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Botón para añadir nuevo curso -->
    <div class="d-flex justify-content-end mt-4 mb-5">
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success">
            Añadir Nuevo Curso
        </a>
    </div>
</div>
@endsection