<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = [
        'payment_due_date',
        'payment_date',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the rental agreement this payment belongs to
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class, 'id', 'rental_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function note(): HasMany
    {
        return $this->hasMany(Note::class, 'payment_id', 'id');
    }

    public function paymenttransaction(): HasMany
    {
        return $this->hasMany(PaymentTransaction::class, 'payment_transaction_id', 'id');
    }
}
