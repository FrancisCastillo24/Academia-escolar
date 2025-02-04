<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestro el listado en el index
        $user = Auth::user();
        $bookings = Booking::all();
        $workshops = Workshop::all();

        // dd($bookings); // <-- Agrega esto para depurar y ver si hay datos

        $view = $user && $user->isAdmin() ? 'admin.booking.index' : 'user.booking.index';
        return view($view, ["bookings" => $bookings, 'workshops' => $workshops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestro la vista del formulario a crear según el rol
        $user = Auth::user();
        $workshops = Workshop::all();
        $view = $user && $user->isAdmin() ? 'admin.booking.create' : 'user.booking.create';
        return view($view, ['workshops' => $workshops]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'workshop_id' => 'required',
        ]);

        Booking::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'workshop_id' => $request->workshop_id,
        ]);

        return redirect()->route("booking.index")->with("success", "Reserva creado con éxito");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $workshops = Workshop::all(); // Asegurarse de obtener los workshops
        $user = Auth::user();
        
        $view = $user && $user->isAdmin() ? 'admin.booking.edit' : 'user.booking.edit';
        return view($view, compact('booking', 'workshops'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Actualizamos los campos de la tabla
        $campos = [
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'workshop_id' => 'required',
        ];

        $mensaje = [
            'required' => 'El campo :attribute está vacio'
        ];

        $request->validate($campos, $mensaje);

        // Obtengo el id elegido a actualizar
        $booking = Booking::findOrFail($id);

        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'workshop_id' => $request->workshop_id,
        ];

        $booking->update($data);

        // Redireccionamos con un mensaje de éxito
        return redirect()->route('booking.index')->with('success', 'Reserva creado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recojo el id del taller a eliminar
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking.index')->with('danger', 'Reserva cancelada con éxito');
    }
}
