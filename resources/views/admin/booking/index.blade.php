@extends("layouts.admin")

@section('title', 'Estudiantes')

@section("content")

<h1 style="text-align:center">INFORME DE TALLERES</h1>

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

@if($workshops->isEmpty())
<h2>No hay talleres disponibles</h2>
@else
<table border="3px solid black">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Teléfono</th>
            <th>Cantidad</th>
            <th>Taller</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->name }}</td>
            <td>{{ $booking->age }}</td>
            <td>{{ $booking->phone }}</td>
            <td>{{ $booking->amount }}</td>
            <td>{{ $booking->workshop->name ?? 'Sin Taller' }}</td>
            <td>
                <form method="POST" action="{{ route('admin.booking.destroy', $booking->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        Eliminar
                    </button>
                </form>
            </td>
            <td>
                <a href="{{ route('admin.booking.edit', $booking->id) }}">
                    Editar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<a href="{{ route('booking.create') }}">Crear una reserva</a>
<a href="{{ route('workshop.index') }}">Volver</a>

@endsection