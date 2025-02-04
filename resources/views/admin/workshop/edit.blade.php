<h1>Taller a editar</h1>

<form action="{{ route('workshop.update', $workshop->id) }}" method="post">
    @csrf <!-- Token de seguridad en Laravel -->
    @method('PUT') <!-- Método PUT para la actualización -->


    <input type="text" name="name" id="name" value="{{ old('name', $workshop->name) }}">
    <input type="text" name="description" id="description" value="{{ old('description', $workshop->description) }}">
    <input type="number" name="price" id="price" value="{{ old('price', $workshop->price) }}">
    <input type="date" name="date" id="date" value="{{ old('date', $workshop->date) }}">
    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $workshop->start_time) }}">
    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $workshop->end_time) }}">
    <input type="submit" value="ENVIAR">
</form><br>

<a href="{{ route('workshop.index') }}">Volver</a>