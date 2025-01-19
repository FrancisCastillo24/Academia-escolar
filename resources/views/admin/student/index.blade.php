@extends("layouts.admin")

@section('title', 'Lista de Alumnos')

@section("content")

<div class="container mt-5">
    <h1 class="mb-4 text-center">Gestión de Alumnos</h1>

    <!-- Mostrar mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Éxito!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('danger'))
    <div class="alert alert-success">
        <strong>¡Éxito!</strong> {{ session('danger') }}
    </div>
    @endif

    <!-- Tabla para pantallas grandes -->
    <div class="d-none d-md-block">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Fecha de Nacimiento</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surname }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay alumnos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Botón para añadir nuevo curso -->
    <div class="d-flex justify-content-end mt-4 mb-5">
    <a href="{{ route('admin.student.create') }}" 
       class="btn btn-success btn-lg text-center btn-responsive">
        Registrar Nuevo Alumno
    </a>
</div>

    <!-- Tarjetas para pantallas pequeñas -->
    <div class="d-md-none">
        @foreach ($students as $student)
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <strong>ID:</strong> {{ $student->id }}
            </div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $student->name }}</p>
                <p><strong>Apellidos:</strong> {{ $student->surname }}</p>
                <p><strong>Dirección:</strong> {{ $student->address }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $student->date_of_birth }}</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginación centrada -->
    <div class="d-flex justify-content-center mt-4">
        <div class="pagination-container">
            <ul class="pagination">
                <li class="page-item {{ $students->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $students->lastPage(); $i++)
                    <li class="page-item {{ $i == $students->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $students->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $students->nextPageUrl() }}" aria-label="Siguiente">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>

@endsection
