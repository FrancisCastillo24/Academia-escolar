<h1>Taller a editar</h1>

<form action="{{ route('workshop.update', $workshop->id) }}" method="post">
    @csrf <!-- Token de seguridad en Laravel -->
    @method('PUT') <!-- Método PUT para la actualización -->

    <input type="text" name="name" id="name" placeholder="{{ old('name', $workshop->name) }}">
    <input type="text" name="description" id="description" placeholder="{{ old('description', $workshop->description) }}">
    <input type="double" name="price" id="price" placeholder="{{ old('price', $workshop->price) }}">
    <input type="datetime-local" name="start_time" id="start_time" placeholder="{{ old('start_time', $workshop->start_time) }}">
    <input type="time" name="end_time" id="end_time" placeholder="{{ old('end_time', $workshop->end_time) }}">
    <input type="submit" value="ENVIAR">
</form><br>

<a href="{{ route('workshop.index') }}">Volver</a>