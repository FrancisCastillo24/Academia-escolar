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
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable'
        ]);

        Workshop::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route("workshop.index")->with("success", "Taller creado con éxito");
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
        $campos = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable'
        ];
    
        $mensaje = [
            'required' => 'El campo :attribute está vacío'
        ];
    
        $request->validate($campos, $mensaje);
    
        $workshop = Workshop::findOrFail($id);
    
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ];
    
        $workshop->update($data);
    
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
