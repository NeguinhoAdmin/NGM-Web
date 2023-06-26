<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Models\RentalPayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('/');
    }

    public function dashboard()
    {
        // Get todays date and time
        $toDay = Carbon::now();

        // Get all outstanding rental payments & count
        $rentalpayments = RentalPayment::all()
            ->where('outstanding', '>', 0);
        $count = $rentalpayments->count();

        // Get the total amount owed
        $rpayments = DB::table('rental_payments')->sum('outstanding');

        $rentals = RentalPayment::all()
            ->where('payment_type', 'rental')
            ->where('outstanding', '>', 0);
        $rcount = $rentals->count();

        $rrpayments = DB::table('rental_payments')
            ->where('payment_type', 'rental')
            ->sum('outstanding');

        $deposits = RentalPayment::all()
            ->where('payment_type', 'deposit')
            ->where('outstanding', '>', 0);
        $dcount = $deposits->count();

        $ddpayments = DB::table('rental_payments')
            ->where('payment_type', 'deposit')
            ->sum('outstanding');

        $forRent = Motorcycle::where('availability', 'for rent');
        $forRentCount = $forRent->count();

        $rented = Motorcycle::where('availability', 'rented');
        $rentedCount = $rented->count();

        $forSale = Motorcycle::where('availability', 'for sale');
        $forSaleCount = $forSale->count();

        $sold = Motorcycle::where('availability', 'sold');
        $soldCount = $sold->count();

        $repairs = Motorcycle::where('availability', 'repairs');
        $repairsCount = $repairs->count();

        $catB = Motorcycle::where('availability', 'cat b');
        $catBCount = $catB->count();

        $claimInProgress = Motorcycle::where('availability', 'claim in progress');
        $claimInProgressCount = $claimInProgress->count();

        return view('home.dashboard', compact(
            'claimInProgressCount',
            'catBCount',
            'repairsCount',
            'soldCount',
            'forSaleCount',
            'rentedCount',
            'forRentCount',
            'toDay',
            'count',
            'rcount',
            'dcount',
            'rpayments',
            'rrpayments',
            'ddpayments'
        ));
    }
}
