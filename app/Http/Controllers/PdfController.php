<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        return view('pdf.rentalAgreement-test2');

        // $name = 'Emmanuel Nwokedi';
        // $email = 'emmanuel.nwokedi@gmail.com';

        // $pdf = Pdf::loadView('pdf.rental-agreement', ['name' => $name, 'email' => $email])
        //     ->setPaper('a4', 'portrait')
        //     ->save(public_path('rental-agreement-' . time() . rand(1, 99999) . 'pdf'));

        // return $pdf->download('rental-agreement' . time() . rand(1, 99999) . 'pdf');
    }
}
