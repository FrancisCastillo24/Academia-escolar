@extends("layouts.admin")
@section('title', 'Cursos')

@section("content")
<h1>PANEL ADMINISTRATIVO</h1>
<form action="{{ route('course.store') }}" method="post">
    @csrf <!-- Token de seguridad obligatorio en Laravel -->
    <div>
        <label for="name">Nombre del curso</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="description">Descripción del curso</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="start_date">Inicio del curso</label>
        <input type="date" name="start_date" id="start_date">
    </div>
    <div>
        <label for="start_end">Fin del curso</label>
        <input type="date" name="start_end" id="start_end">
    </div>
    <button type="submit">Crear Curso</button>
</form>
@endsection