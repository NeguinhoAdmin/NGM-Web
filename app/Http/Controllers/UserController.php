<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use Nette\Utils\Json;
use App\Models\Rental;
use App\Mail\UserEmail;
use App\Models\Address;
use App\models\Payment;
use App\Models\Motorcycle;
use Illuminate\Support\Js;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('is_client', 1);
        // dd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required | unique:users',
            'nationality' => 'required',
            'driving_licence' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
        ]);

        // Generating random 9 figure number - used to generate unique UserName
        $a = 0;
        for ($i = 0; $i < 6; $i++) {
            $a .= mt_rand(0, 9);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->nationality = $request->nationality;
        $user->driving_licence = $request->driving_licence;
        $user->username = $request->first_name . $a . $request->last_name;
        $user->street_address = $request->street_address;
        $user->street_address_plus = $request->street_address_plus;
        $user->city = $request->city;
        $user->post_code = $request->post_code;
        $user->is_client = 1;
        $user->save();

        return redirect('/users')
            ->with('success', 'Client has been added to NGM client list.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user_id)
    {
        $u = User::find($user_id);
        $user = json_decode($u);
        $authUser = Auth::user();
        $request->session()->put('user_id', $user_id);

        $motorcycles = Motorcycle::all()
            ->where('user_id', $user_id);

        foreach ($motorcycles as $motorcycle) {
            $motorcycle_id = $motorcycle->id;
            $request->session()->put('motorcycle_id', $motorcycle_id);
        }

        // $rentals = Rental::orderBy('id', 'DESC')->where('user_id', $user_id)->get();
        // foreach ($rentals as $rental) {
        //     $rental_id = $rental->id;
        //     $request->session()->put('rental_id', $rental_id);
        // }

        // $payments = Payment::all()
        //     ->where('user_id', $user_id);

        $now = Carbon::now();
        $toDate = Carbon::parse("2023-05-29");
        $fromDate = Carbon::parse("2022-08-20");

        $days = $toDate->diffInDays($now);
        $months = $toDate->diffInMonths($fromDate);
        $years = $toDate->diffInYears($fromDate);

        $d = File::all()->where('user_id', $user_id);
        $documents = json_decode($d);
        $dlFront = "Driving Licence Front";

        // dd($documents);
        // print_r("In Days: " . $days . "<br>");
        // print_r("In Months: " . $months . "<br>");
        // print_r("In Years: " . $years);

        $address = UserAddress::all()->where('user_id', $user_id);
        // dd($days);
        return view("users.show", compact("user", "address", "documents", "dlFront", "motorcycles", "days"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->nationality = $request->nationality;
        $user->driving_licence = $request->driving_licence;
        $user->street_address = $request->street_address;
        $user->street_address_plus = $request->street_address_plus;
        $user->city = $request->city;
        $user->post_code = $request->post_code;
        $user->updated_at = $request->updated_at;
        $user->save();

        return to_route('users.show', [$id])
            ->with('success', 'Client details have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendEmail(Request $request)
    {
        $users = User::whereIn("id", $request->ids)->get();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new UserEmail($user));
        }

        return response()->json(['success' => 'Send email successfully.']);
    }
}
