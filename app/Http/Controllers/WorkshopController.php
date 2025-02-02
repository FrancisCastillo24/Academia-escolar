<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestro el listado en el index
        $user = Auth::user();
        $workshops = Workshop::all();

        // dd($talleres); // <-- Agrega esto para depurar y ver si hay datos

        $view = $user && $user->isAdmin() ? 'admin.workshop.index' : 'user.workshop.index';
        return view($view, ["workshops" => $workshops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestro la vista del formulario a crear
        return view("admin.workshop.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date_format:H:i',
        ]);

        Workshop::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route("workshop.index")->with("success", "TALLER CREADO CON ÉXITO");
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
        // Recibo el id del taller a editar
        $workshop = Workshop::findOrFail($id);

        // Lo mando a la vista
        return view('admin.workshop.edit', ['workshop' => $workshop]);
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
            'price' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ];

        $mensaje = [
            'required' => 'El campo :attribute está vacio'
        ];

        $request->validate($campos, $mensaje);

        // Obtengo el id elegido a actualizar
        $workshop = Workshop::findOrFail($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ];

        $workshop->update($data);

        // Redireccionamos con un mensaje de éxito
        return redirect()->route('workshop.index')->with('success', 'Taller actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recojo el id del taller a eliminar
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();
        return redirect()->route('workshop.index')->with('danger', 'Taller eliminado con éxito');
    }
}
