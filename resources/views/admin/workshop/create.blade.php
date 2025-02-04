<h1>INSCRIPCIÓN DE FORMULARIO</h1>

<form action="{{ route('workshop.index') }}" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <input type="text" name="description" id="description">
    <input type="number" name="price" id="price" step="0.01">
    <input type="date" name="date" id="date">
    <input type="time" name="start_time" id="start_time">
    <input type="time" name="end_time" id="end_time">
    <input type="submit" value="ENVIAR">
</form><br>

<a href="{{ route('workshop.index') }}">Volver</a>
