<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <!-- Enlace a Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+... (integridad comprimida)" crossorigin="anonymous">
</head>

<body class="bg-light"> <!-- Fondo gris claro en todo el body -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-4 rounded shadow-sm">
                <h2 class="mb-4 text-center">Mis Reservas</h2>

                <!-- Verificación si el usuario tiene reservas -->
                @if ($bookings->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    No tienes reservas realizadas aún.
                </div>
                @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Taller</th>
                            <th>Fecha - Hora Inicio</th>
                            <th>Hora Finalización</th>
                            <th>Precio</th>
                            <th>Nº reservas</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mostrar las reservas del usuario -->
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->workshop->name }}</td>
                            <td>{{ $booking->workshop->start_time }}</td>
                            <td>{{ $booking->workshop->end_time }}</td>
                            <td>{{ $booking->workshop->price }}€</td>
                            <td>{{ $booking->amount }}</td>
                            <td>
                                <form action="{{ route('booking.addBooking', $booking->id) }}" method="post" onsubmit="return confirm('¿Estás seguro que quieres reservar otra entrada?');">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-success btn-sm">Añadir</button>
                                </form>

                            </td>
                            <td>
                                <form method="POST" action="{{ route('booking.destroy', $booking->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Quitar</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Mostrar el total a pagar -->
                <div class="alert alert-info text-center" role="alert">
                    <strong>Total a Pagar: {{ $total }}€</strong>
                </div>
                @endif

                <!-- Botón para volver a la página anterior -->
                <div class="mt-4 text-end">
                    <a href="{{ route('workshop.index') }}" class="btn btn-secondary">Volver a los Talleres</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq+TmT3z6wAozg5n77er8S9/ePpzMk/bbO2T/xOZ9b6+" crossorigin="anonymous"></script>
</body>

</html>