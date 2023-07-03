<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Motorcycle;
use App\Models\Rental;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RentalSignupController extends Controller
{
    // Show rental sign-up form
    public function rentalSignUp($motorcycle_id)
    {
        $motorcycle = Motorcycle::where('id', $motorcycle_id)->first();
        $deposit = 300.00;

        return view('contacts.rental-signup', compact('motorcycle', 'deposit'));
    }

    // Process rental sign-up form
    public function storeSignUp(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            // 'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'nationality' => 'required',
            'licence' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'post_code' => 'required',
        ]);

        $password = "Rental3786";

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->nationality = $request->nationality;
        $user->driving_licence = $request->driving_licence;
        $user->username = $request->email;
        $user->street_address = $request->address1;
        $user->street_address_plus = $request->address2;
        $user->city = $request->city;
        $user->post_code = $request->post_code;
        $user->is_client = 1;
        $user->save();

        $userId = $user->id;
        $userName = $user->first_name . " " . $user->last_name;

        $motorcycle = Motorcycle::find($request->motorcycle_id);
        $motorcycle->user_id = $userId;
        $motorcycle->availability = 'rented';
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $motorcycle->file_name = time() . '_' . $request->file->getClientOriginalName();
            $motorcycle->file_path = '/storage/' . $filePath;
        }
        $motorcycle->save();

        $deposit = 300;
        $toDay = Carbon::now();

        return view('frontend.legals.rental-agreement', compact('toDay', 'user', 'motorcycle', 'deposit'));
    }

    // Show rental rental agreement
    public function showAgreement(Request $request)
    {
        dd($request);
        $toDay = Carbon::now();
        return view('frontend.legals.rental-agreement', compact('toDay'));
    }

    // Process rental agreement - Save new client signature function
    public function signedAgreement(Request $request)
    {
        $base64_image = $request->input('sign'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $fileName = str_random(10) . '.' . 'png';
        Storage::put($fileName, base64_decode($file_data));

        $authUser = Auth::user();
        $rental = new Rental();
        $rental->user_id = $request->user_id;
        $rental->signature = $fileName;
        $rental->motorcycle_id = $request->motorcycle_id;
        $rental->registration = $request->registration;
        $rental->deposit = $request->deposit;
        $rental->price = $request->rental_price;
        $rental->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $rental->save();

        return redirect()->route('motorcycle.rentals')->with('success', 'Agreement has been saved');
    }

    // View Rental Agreements

}
