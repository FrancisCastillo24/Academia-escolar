@extends("layouts.main")
@section('title', 'Talleres')

@section("content")
@if(session('error'))
    <div class="alert alert-danger w-50 mx-auto text-center mt-3">
        {{ session('error') }}
    </div>
@endif


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
        <td>{{ $workshop->date }} | {{ $workshop->start_time }}</td>
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
    <a href="{{ route('booking.create') }}" class="btn btn-success">Reservar un Taller</a>
</div>

    <!-- Mensaje con botón para ver reservas -->
    <div class="container text-center mt-4">
        <p>¿Ya tienes una reserva? <a href="{{ route('booking.index') }}" class="btn btn-info">Ver mis reservas</a></p>
    </div>
@endsection