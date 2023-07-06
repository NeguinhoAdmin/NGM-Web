<?php

namespace App\Http\Controllers;

use App\Mail\RentalAgreement;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Motorcycle;
use App\Models\Rental;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

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
        $toDay = new DateTime();

        return view('frontend.legals.rental-agreement', compact('toDay', 'user', 'motorcycle', 'deposit'));
    }

    // Show rental rental agreement
    public function showAgreement(Request $request)
    {
        dd($request);
        $toDay = new DateTime();
        return view('frontend.legals.rental-agreement', compact('toDay'));
    }

    // Process rental agreement - Save new client signature function
    public function signedAgreement(Request $request)
    {
        $base64_image = $request->input('sign'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $fileName = $request->first_name . '-' . $request->last_name . '-' . str_random(10) . '.' . 'jpg';
        Storage::disk('public')->put($fileName, base64_decode($file_data));
        // Storage::disk('uploads')->put($fileName, base64_decode($file_data));
        // Storage::put($fileName, base64_decode($file_data));

        $authUser = Auth::user();
        $rental = new Rental();
        $rental->user_id = $request->user_id;
        $rental->signature = $fileName;
        $rental->motorcycle_id = $request->motorcycle_id;
        $rental->registration = $request->registration;
        $rental->make = $request->make;
        $rental->model = $request->model;
        $rental->engine = $request->engine;
        $rental->year = $request->year;
        $rental->colour = $request->colour;
        $rental->deposit = $request->deposit;
        $rental->price = $request->rental_price;
        $rental->auth_user = $authUser->first_name . " " . $authUser->last_name;
        $rental->save();

        $user = User::where('id', $rental->user_id)->first();

        // Call the PDF create and email function
        $this->PdfAgreement($user, $rental);
        return redirect()->route('home');

        // return view('pdf.rental-agreement', compact('rental', 'user', 'toDay', 'motorcycle'));
    }

    // Send the signed PDF document
    public function PdfAgreement($user, $rental)
    {
        $toDay = new DateTime();
        $toDay = Carbon::parse($toDay)->format('d/m/Y');

        // Collect and merge agreement data
        $u = User::where('id', $user->id)->first();
        $r = Rental::where('signature', $rental->signature)->first();

        $user = collect($u);
        $rental = collect($r);
        $agree = $rental->merge($user);
        $agreement = json_decode($agree);

        // Save PDF to file
        $pdf = Pdf::loadView('pdf.rental-agreement', ['agreement' => $agreement, 'u' => $u, 'toDay' => $toDay])
            ->setPaper('a4', 'portrait')
            ->save(public_path('rental-agreement-' . time() . rand(1, 99999) . '.pdf'));

        // Send email with PDF to client
        $data["email"] = $u->email;
        $data["title"] = "Rental Agreement";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('pdf.rental-agreement', ['agreement' => $agreement, 'u' => $u, 'toDay' => $toDay]);
        $data["pdf"] = $pdf;

        Mail::to($data["email"])->send(new RentalAgreement($data));

        // return $pdf->stream();
        // return route('isRented');
        return redirect()->route('isRented');
    }
}
