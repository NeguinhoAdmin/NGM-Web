<?php

namespace App\Models;

// use Shopper\Framework\Models\User\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use DB;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Active Now 
    public function UserOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }

    /**
     * Get the rental contracts for the user.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class, 'user_id', 'id');
    }

    /**
     * Get the rental contracts for the user.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'user_id', 'id');
    }
}
