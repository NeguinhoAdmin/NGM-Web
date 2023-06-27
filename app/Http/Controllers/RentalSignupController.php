<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;

class RentalSignupController extends Controller
{
    public function RentalSignUp($motorcycle_id)
    {
        $motorcycle = Motorcycle::where('id', $motorcycle_id)->first();

        return view('contacts.rental-signup', compact('motorcycle'));
    }
}
