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
            <th>Descripción</th>
            <th>Precio</th>
            <th>Fecha - Hora Inicio</th>
            <th>Fin</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($workshops as $workshop)
        <tr>
            <td>{{ $workshop->id }}</td>
            <td>{{ $workshop->name }}</td>
            <td>{{ $workshop->description }}</td>
            <td>{{ $workshop->price }}</td>
            <td>{{ $workshop->date }} | {{ $workshop->start_time }}</td>
            <td>{{ $workshop->end_time }}</td>
            <td>
                <form method="POST" action="{{ route('admin.workshop.destroy', $workshop->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este estudiante?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        Eliminar
                    </button>
                </form>
            </td>
            <td>
                <a href="{{ route('admin.workshop.edit', $workshop->id) }}">
                    Editar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<a href="{{ route('admin.workshop.create') }}">Ir al formulario</a>
<a href="{{ route('booking.index') }}">Ver las reservas</a>
@endsection