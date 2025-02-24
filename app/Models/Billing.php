<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workshop_amount',
        'fee_price',
        'price',
        'payment date',
        'Payment method',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
