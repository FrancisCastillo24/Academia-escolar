<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <!-- Enlace a Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+... (integridad comprimida)" crossorigin="anonymous">
</head>

<body class="bg-light"> <!-- Fondo gris claro en todo el body -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 rounded shadow-sm">
                <h2 class="mb-4 text-center">Formulario de Reserva</h2>
                <form action="{{ route('booking.store') }}" method="post">
                    @csrf

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <!-- Campo Edad -->
                    <div class="mb-3">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" name="age" id="age" class="form-control" required>
                    </div>

                    <!-- Campo Teléfono -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="number" name="phone" id="phone" class="form-control" required>
                    </div>

                    <!-- Campo Cantidad -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Cantidad de Personas</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>

                    <!-- Campo Taller -->
                    <div class="mb-3">
                        <label for="workshop_id" class="form-label">Selecciona un Taller</label>
                        <select name="workshop_id" id="workshop_id" class="form-select" required>
                            <option value="0" selected>Selecciona un taller</option>
                            @foreach ($workshops as $workshop)
                            <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botón de Enviar -->
                    <button type="submit" class="btn btn-primary w-100">Enviar Reserva</button>
                    <div class="mt-3">
                        <a href="{{ route('workshop.index') }}" class="btn btn-secondary w-100">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq+TmT3z6wAozg5n77er8S9/ePpzMk/bbO2T/xOZ9b6+" crossorigin="anonymous"></script>
</body>

</html>
