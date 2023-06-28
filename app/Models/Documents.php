<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Creagia\LaravelSignPad\Concerns\RequiresSignature;
use Creagia\LaravelSignPad\Contracts\CanBeSigned;

class Documents extends Model implements CanBeSigned
{
    use HasFactory, RequiresSignature;

    protected $fillable = ['path'];
}
