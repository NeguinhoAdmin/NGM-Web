<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\AccidentManagement;
use App\Mail\RentalDue;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class MailController extends Controller
{
    public function sendMail($name): RedirectResponse
    {
        Mail::to('customerservice@neguinhomotors.co.uk')->send(new ContactUs($name));

        return redirect('contacts.thank-you');
    }

    public function AccidentManagement($request): RedirectResponse
    {
        Mail::to('customerservice@neguinhomotors.co.uk')->send(new AccidentManagement($request));

        return redirect('contacts.thank-you');
    }
}
