<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\RentalDue;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class MailController extends Controller
{
    public function sendMail($name): RedirectResponse
    {
        // $name = $request->name;

        Mail::to('customerservice@neguinhomotors.co.uk')->send(new ContactUs($name));

        // return view('thank-you');
        return redirect('contacts.thank-you');
    }
}
