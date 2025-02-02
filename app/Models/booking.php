<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'phone',
        'amount',
        'workshop_id'
    ];

    // Cada reserva (booking) está asociada con un solo taller (workshop), esto significa que en la tabla reservas, cada registro tendrá un campo workshop_id que será una clave foránea que hace referencia al id de la tabla taller

    public function workshop()
    {
        // Cada reserva pertenece a un único taller
        return $this->belongsTo(Workshop::class);
    }

}
