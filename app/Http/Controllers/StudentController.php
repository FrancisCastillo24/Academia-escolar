<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
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

        // Solo mostrar los que son estudiantes
        $students = User::where('role', 'user')->paginate(5);

        if (!$user->isAdmin()) {
            return abort(403, 'Acceso denegado');
        }

        return view('admin.student.index', ['students' => $students]);
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        // Validamos los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'password' => 'required',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric|digits_between:8,15',
            'role' => 'required|in:user',
        ]);


        // Creamos los cursos
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        return redirect()->route("student.index")->with("success", "Estudiante registrado con éxito");
    }

    public function edit(string $id)
    {
        // Recibo el ID del curso que queremos editar
        $studentEdit = User::findOrFail($id);

        // Mandamos a la vista el curso seleccionado
        return view("admin.student.edit", ["student" => $studentEdit]);
    }

    public function update(Request $request, string $id)
    {
        $campos = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric|digits_between:8,15',
        ];

        $mensaje = [
            'required' => 'El campo :attribute está vacío'
        ];

        $request->validate($campos, $mensaje);

        $student = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone
        ];

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Estudiante actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recojo el id del curso
        $student = User::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Alumno eliminado con éxito');
    }
}
