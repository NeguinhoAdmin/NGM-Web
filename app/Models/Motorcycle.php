<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'payment_due_date',
        'next_payment_date',
        'rental_start_date',
        'payment_date',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
