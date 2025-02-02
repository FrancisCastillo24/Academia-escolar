<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workshop extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'start_time',
        'end_time'
    ];
}
