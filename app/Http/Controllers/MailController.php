<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\RentalDue;
use Illuminate\Support\Carbon;
use App\Models\User;

class MailController extends Controller
{
    public function sendMail($name)
    {
        // $name = $request->name;

        Mail::to('fake@mail.com')->send(new ContactUs($name));

        // return view('thank-you');
    }
}
