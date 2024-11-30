@extends("layouts.app")
@section('title', 'Cursos')

@section("content")
<div class="container mt-5">
    <h3 style="text-align: center">Listado de cursos disponibles</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>DURATION</th>
                <th>START_DATE</th>
                <th>START_END</th>
            </tr>
            <thead>
            <tbody>
                <tr>
                    @forelse ($courses as $course)
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->start_date }}</td>
                    <td>{{ $course->start_end }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No disponible</td>
                </tr>
                @endforelse
            </tbody>
    </table>
</div>
@endsection

@section("content_second")
<div class="container">
    <h3>Aquí se muestra el apartado de cursos</h3>
</div>
@endsection