@extends("layouts.main")
@section('title', 'Talleres')

@section("content")
<table class="container table table-striped-columns mt-5">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha - Hora Inicio</th>
        <th>Hora Finalización</th>
        <th>Precio</th>
    </tr>
    @forelse ($workshops as $workshop)
    <tr>
        <td>{{ $workshop->name }}</td>
        <td>{{ $workshop->description }}</td>
        <td>{{ $workshop->start_time }}</td>
        <td>{{ $workshop->end_time }}</td>
        <td>{{ $workshop->price }}€</td>
    </tr>
    @empty
    <tr>
        <td colspan="4" class="text-center" style="background-color: #FFB84D; color: black;">No hay cursos disponibles</td>
    </tr>
    @endforelse
</table>

<!-- Botón para reservar, fuera de la tabla -->
<div class="container text-end mb-3">
    <a href="" class="btn btn-success">Reservar un Taller</a>
</div>
@endsection