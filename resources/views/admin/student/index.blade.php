@extends("layouts.admin")

@section('title', 'Estudiantes')

@section("content")
<div class="container mt-5">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Gestión de Estudiantes</h1>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @elseif(session('danger'))
    <div class="alert alert-danger">
        <strong>¡Error!</strong> {{ session('danger') }}
    </div>
    @endif

    <!-- Tabla de estudiantes -->
    <div class="table-responsive">
        <table class="table custom-table">
            <thead class="custom-thead">
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
                @forelse ($students as $student)
                <tr>
                    <td class="text-center" data-label="Código">{{ $student->id }}</td>
                    <td class="text-center" data-label="Nombre">{{ $student->name }}</td>
                    <td class="text-center" data-label="Descripción">{{ $student->surname }}</td>
                    <td class="text-center" data-label="Fecha de Inicio">{{ $student->address }}</td>
                    <td class="text-center" data-label="Fecha de Finalización">{{ $student->date_of_birth }}</td>
                    <td class="text-center" data-label="Acciones">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form method="POST" action="" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este estudiante?');">
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
                    <td colspan="6" class="text-center text-muted">No hay estudiantes disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Botón para añadir nuevo estudiante -->
    <div class="d-flex justify-content-end mt-4 mb-5">
        <a href="" class="btn btn-success">
            Añadir Nuevo Estudiante
        </a>
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
