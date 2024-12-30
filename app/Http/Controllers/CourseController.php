<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Muestra el listado de cursos
     */
    public function index()
    {
        // Almaceno en una variable los cursos y lo muestro en la ruta dependiendo el rol
        $user = Auth::user();
        $courses = Course::all(); // Cambia el número de elementos por página según sea necesario

        // Verifico el rol del usuario y redirijo a la vista correspondiente
        $view = $user && $user->isAdmin() ? 'admin.course.index' : 'user.course.index';

        // $view = $user->isAdmin() ? 'admin.course.index' : 'user.course.index';
        return view($view, ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.course.create");
    }

    /**
     * Almaceno los cursos
     */
    public function store(Request $request)
    {
        // Validamos los campos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'start_end' => 'required|date|after:start_date',
        ]);

        // Creamos los cursos
        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'start_end' => $request->start_end
        ]);

        return redirect()->route("course.index")->with("success", "Curso almacenado en la base de datos");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recibo el ID del curso que queremos editar
        $course = Course::findOrFail($id);

        // Mandamos a la vista el curso seleccionado
        return view("admin.course.edit", ["course" => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Actualizamos los campos de la tabla
        $campos = [
            'name' => 'required',
            'description' => 'required|min:10',
            'start_date' => 'required',
            'start_end' => 'required'
        ];

        $mensaje = [
            'required' => 'El campo :attribute está vacio'
        ];

        $request->validate($campos, $mensaje);

        // Obtengo el curso de la base de datos
        $course = Course::findOrFail($id);

        // Actualizamos los campos de la base de datos
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'start_end' => $request->start_end
        ];

        $course->update($data);

        // Redireccionamos con un mensaje de éxito
        return redirect()->route('course.index')->with('success', 'Curso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recojo el id del curso
        $curso = Course::findOrFail($id);
        $curso->delete();
        return redirect()->route('course.index')->with('danger', 'Curso eliminado con éxito');
    }
}
