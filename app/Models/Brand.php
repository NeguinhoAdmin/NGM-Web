<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shopper\Framework\Models\Shop\Product;

class Brand extends Product\Brand
{
    use HasFactory;

    public function brand()
    {
        return $this->hasMany(Product::class);
    }
}
