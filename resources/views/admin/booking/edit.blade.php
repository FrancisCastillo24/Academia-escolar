<h1>Taller a editar</h1>

<form action="{{ route('booking.update', $booking->id) }}" method="post">
    @csrf <!-- Token de seguridad en Laravel -->
    @method('PUT') <!-- Método PUT para la actualización -->

    <input type="text" name="name" id="name" placeholder="{{ old('name', $booking->name) }}">
    <input type="number" name="age" id="age" placeholder="{{ old('age', $booking->age) }}">
    <input type="number" name="phone" id="phone" placeholder="{{ old('phone', $booking->phone) }}">
    <input type="number" name="amount" id="amount" placeholder="{{ old('amount', $booking->amount) }}">
    <select name="workshop_id" id="workshop_id">
    <option value="">Selecciona un taller</option>
    @foreach ($workshops as $workshop)
        <option value="{{ $workshop->id }}" 
            {{ isset($booking) && $booking->workshop_id == $workshop->id ? 'selected' : '' }}>
            {{ $workshop->name }}
        </option>
    @endforeach
</select>


    <input type="submit" value="ENVIAR">
</form><br>

<a href="{{ route('workshop.index') }}">Volver</a>