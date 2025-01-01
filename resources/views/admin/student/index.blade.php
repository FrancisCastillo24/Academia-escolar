@extends("layouts.admin")

@section('title', 'Cursos')

@section("content")

<div class="table-container">
    <table class="courses-table">
        <thead>
            <tr class="table-header">
                <th class="table-cell">ID</th>
                <th class="table-cell">Nombre</th>
                <th class="table-cell">Apellidos</th>
                <th class="table-cell">Dirección</th>
                <th class="table-cell">Fecha de Nacimiento</th>
                <th colspan="2" class="table-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            <tr class="table-row">
                <td class="table-cell">{{ $student->id }}</td>
                <td class="table-cell">{{ $student->name }}</td>
                <td class="table-cell">{{ $student->surname }}</td>
                <td class="table-cell">{{ $student->address }}</td>
                <td class="table-cell">{{ $student->date_of_birth }}</td>
                <td class="table-cell actions">
                    <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
                <td class="table-cell actions">
                    <a href="{{ route('admin.student.edit', $student->id) }}" class="edit-btn">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr class="table-row">
                <td colspan="7" class="table-cell no-courses">No hay alumnos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection