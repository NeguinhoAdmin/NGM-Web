<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Motorcycle extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];
    protected $dates = [
        'payment_due_date',
        'next_payment_date',
        'rental_start_date',
        'payment_date',
        'tax_due_date',
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

    /**
     *  Get the indexable data array for the model.
     *
     *  @return array
     */
    public function toSearchableArray()
    {
        return [
            'registration' => $this->registration,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'availability' => $this->availability,
            'rental_price' => $this->rental_price,
            'engine' => $this->engine,
        ];
    }
}
