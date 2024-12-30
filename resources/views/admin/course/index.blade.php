@extends("layouts.admin")
@section('title', 'Cursos')

@section("content")

<table class="courses-table">
    <thead>
        <tr class="table-header">
            <th class="table-cell">ID</th>
            <th class="table-cell">Nombre</th>
            <th class="table-cell">Descripción</th>
            <th class="table-cell">Fecha de Inicio</th>
            <th class="table-cell">Fecha de Finalización</th>
            <th colspan="2" class="table-cell">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
        <tr class="table-row">
            <td class="table-cell">{{ $course->id }}</td>
            <td class="table-cell">{{ $course->name }}</td>
            <td class="table-cell">{{ $course->description }}</td>
            <td class="table-cell">{{ $course->start_date }}</td>
            <td class="table-cell">{{ $course->start_end }}</td>
            <td class="actions">
                <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este curso?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
            <td class="actions">
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="edit-btn">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="no-courses">No hay cursos disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
