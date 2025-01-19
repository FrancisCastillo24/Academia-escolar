<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ¿Usuario o administrador?
        $user = Auth::user();
        $students = Student::paginate(5);

        $view = $user && $user->isAdmin() ? 'admin.student.index' : 'user.student.index';
        return view($view, ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Crear alumno a este formulario
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los campos
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date|after:start_date',
        ]);

        // Creamos los estudiantes
        Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth
        ]);

        return redirect()->route("student.index")->with("success", "Alumno registrado en la base de datos");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Recibo el ID del curso que queremos editar
        $studentEdit = Student::findOrFail($id);

        // Mandamos a la vista el curso seleccionado
        return view("admin.student.edit", ["student" => $studentEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Actualizamos los campos de la tabla
        $campos = [
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date|after:start_date',
        ];

        $mensaje = [
            'required' => 'El campo :attribute está vacio'
        ];

        $request->validate($campos, $mensaje);

        // Obtengo el curso de la base de datos
        $student = Student::findOrFail($id);

        // Actualizamos los campos de la base de datos
        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth
        ];

        $student->update($data);
        // Redireccionamos con un mensaje de éxito
        return redirect()->route('student.index')->with('success', 'Alumno actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recojo el id del curso
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('danger', 'Alumno eliminado con éxito');
    }
}
