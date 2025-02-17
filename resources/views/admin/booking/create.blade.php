<h1>INSCRIPCIÓN DE FORMULARIO</h1>

<form action="{{ route('booking.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <input type="number" name="age" id="age">
    <input type="number" name="phone" id="phone">
    <input type="number" name="amount" id="amount">
    <select name="workshop_id" id="workshop_id">
        <option value="0" selected>Selecciona un taller</option>
        @foreach ($workshops as $workshop)
            <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
        @endforeach
    </select>
    <input type="submit" value="ENVIAR">
</form><br>

<a href="{{ route('booking.index') }}">Volver</a>
