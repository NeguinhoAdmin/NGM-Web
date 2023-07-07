<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Motorcycle;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\RentalPayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::User()->is_admin;

        if ($role == 1) {
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
        } else {
            $user = Auth::user();
            $u = User::find($user->id);
            $user = json_decode($u);
            $authUser = Auth::user();

            $motorcycles = Motorcycle::all()
                ->where('user_id', $user->id);

            foreach ($motorcycles as $motorcycle) {
                $motorcycle_id = $motorcycle->id;
            }

            $now = Carbon::now();
            $toDate = Carbon::parse("2023-05-29");
            $fromDate = Carbon::parse("2022-08-20");

            $days = $toDate->diffInDays($now);
            $months = $toDate->diffInMonths($fromDate);
            $years = $toDate->diffInYears($fromDate);

            $d = File::all()->where('user_id', $user->id);
            $documents = json_decode($d);
            $dlFront = "Driving Licence Front";

            $address = UserAddress::all()->where('user_id', $user->id);
            return view('home_client.show-user', compact("user", "address", "documents", "dlFront", "motorcycles", "days"));
        }

        // return view('/');
    }
}
