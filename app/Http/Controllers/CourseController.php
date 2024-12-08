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
        $courses = Course::all();

        // $view = $user->isAdmin() ? 'admin.course.index' : 'user.course.index';
        return view('user.course.index', ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
