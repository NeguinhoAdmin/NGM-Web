<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use DateTime;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $today = new DateTime();
        $user = User::where('id', 117)->first();
        $rental = Rental::where('user_id', 117)->first();
        // dd($rental->signature);
        return view('pdf.rentalAgreement-test', ['user' => $user, 'rental' => $rental, 'today' => $today]);

        // $name = 'Emmanuel Nwokedi';
        // $email = 'emmanuel.nwokedi@gmail.com';

        // $pdf = Pdf::loadView('pdf.rental-agreement', ['name' => $name, 'email' => $email])
        //     ->setPaper('a4', 'portrait')
        //     ->save(public_path('rental-agreement-' . time() . rand(1, 99999) . 'pdf'));

        // return $pdf->download('rental-agreement' . time() . rand(1, 99999) . 'pdf');
    }
}
