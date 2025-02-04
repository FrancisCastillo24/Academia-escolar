<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'date',
        'start_time',
        'end_time'
    ];

    public function booking()
    {
        // Un taller tiene muchas reservas
        return $this->hasMany(Booking::class);
    }
}
