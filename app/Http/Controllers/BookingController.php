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
        // Verificar si el usuario está autenticado
        $user = Auth::user();

        if (!$user) {
            // Si el usuario no está autenticado, redirige al índice de los talleres
            return redirect()->route('workshop.index')->with('error', 'Vaya, ¡no estás registrado!');
        }

        // Verificar si el usuario es un administrador
        $workshops = Workshop::all();
        if ($user->isAdmin()) {
            // Si es administrador, mostrar todas las reservas
            $bookings = Booking::all();
        } else {
            // Si el usuario no es administrador (usuario normal), obtener solo las reservas de ese usuario
            $bookings = Booking::where('user_id', $user->id)->get();
        }

        // Calcular el total a pagar con el método privado que has creado
        $total = $this->calculateTotal($bookings);

        // Determinar la vista según el rol del usuario
        $view = $user->isAdmin() ? 'admin.booking.index' : 'user.booking.index';
        return view($view, ["bookings" => $bookings, 'workshops' => $workshops, "total" => $total]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('workshop.index')->with('error', 'Vaya, ¡no estás registrado!');
        }

        // Obtener el usuario autenticado y los workshops disponibles
        $user = Auth::user();
        $workshops = Workshop::all();

        // Determinar la vista según el rol del usuario
        $view = $user->isAdmin() ? 'admin.booking.create' : 'user.booking.create';

        // Retornar la vista correspondiente con los workshops
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
            'workshop_id' => 'required|exists:workshops,id',
        ]);

        Booking::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'workshop_id' => $request->workshop_id,
            'user_id' => Auth::id(), // Asignar el usuario autenticado
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

        // En caso de tener varias reservas de un taller
        if ($booking->amount > 1) {
            $booking->amount -= 1; // Se resta <un></un>a cantidad
            $booking->save();
            return redirect()->route('booking.index')->with('danger', 'Se ha cancelado una reserva del taller');
        }

        // Si solo hay una cantidad, se borra la reserva
        $booking->delete();
        return redirect()->route('booking.index')->with('danger', 'Reserva cancelada con éxito');
    }

    // Método para calcular el total a pagar en las reservas
    private function calculateTotal($bookings)
    {
        return $bookings->sum(function ($booking) { // Recorre todas las reservas de cada taller
            return $booking->workshop->price * $booking->amount; // Accedemos al precio de cada taller y sumamos todos los precios por la cantidad y devolvemos el total sumado
        });
    }

    public function addBooking($id)
    {
        // Seleccionamos el la reserva
        $booking = Booking::findOrFail($id);
        $addBooking = $booking->amount++;
        $booking->save();
        return redirect()->route('booking.index')->with('success', 'Se ha reservado una entrada');
    }
}
