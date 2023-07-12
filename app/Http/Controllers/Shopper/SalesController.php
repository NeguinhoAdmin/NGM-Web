<?php

namespace App\Http\Controllers\Shopper;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Filerental;
use Illuminate\Support\Composer;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use system;

class SalesController extends Controller
{
    // Display all new bikes
    public function NewForSale()
    {
        $motorcycles = Motorcycle::all()
            ->where('availability', '=', 'for sale');

        return view('frontend.motorcycles-new', compact('motorcycles'));
    }

    // Show details of a particular used bike
    public function NewBikeDetails($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        // Generating random 9 figure number - used to generate unique UserName
        $a = 0;
        for ($i = 0; $i < 1; $i++) {
            $a .= mt_rand(0, 9);
        }

        return view('frontend.motorcycle-new', compact('motorcycle', 'a'));
    }

    // Display all used bikes
    public function UsedForSale()
    {
        $motorcycles = Motorcycle::all()
            ->where('availability', '=', 'used for sale');

        $count = $motorcycles->count();

        return view('frontend.motorcycles-used', compact('motorcycles'));
    }

    // Show details of a particular used bike
    public function UsedBikeDetails($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        return view('frontend.motorcycle-used', compact('motorcycle'));
    }

    // Display all rental bikes
    public function RentBike()
    {
        $motorcycles = Motorcycle::all()
            ->where('availability', '=', 'for rent');

        $count = $motorcycles->count();

        return view('frontend.motorcycle-rentals', compact('motorcycles'));
    }

    // Display all rental bikes
    public function RentHire()
    {
        $motorcycles = Motorcycle::all()
            ->where('availability', '=', 'for rent');

        $count = $motorcycles->count();

        return view('frontend.motorcycle-rental-hire', compact('motorcycles'));
    }

    // Show details of a particular rental bike
    public function RentalDetails($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        return view('frontend.motorcycle-rental', compact('motorcycle'));
    }
}
