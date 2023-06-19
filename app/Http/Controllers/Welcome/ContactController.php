<?php

namespace App\Http\Controllers\Welcome;

use Mail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\MailController;
use App\Models\Motorcycle;
use App\Models\Product;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('contacts.contact');
    }

    public function CallMeBack()
    {
        return view('contacts.contactCallBack');
    }

    public function TradeAccount()
    {
        return view('contacts.contactTradeAccount');
    }

    public function ContactNewSales($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        return view('contacts.contactNewSales', compact('motorcycle'));
    }

    public function StoreMessage(Request $request)
    {
        // dd($request->message);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        $mail = new MailController();
        $mail->sendMail($request->name);

        // Contact::insert([
        // 'name' => $request->name,
        // 'email' => $request->email,
        // 'subject' => $request->subject,
        // 'phone' => $request->phone,
        // 'message' => $request->message,
        // 'created_at' => Carbon::now(),
        // ]);

        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function ContactSales(Request $request)
    {
        // dd($request->message);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        $mail = new MailController();
        $mail->sendMail($request->name);

        // Contact::insert([
        // 'name' => $request->name,
        // 'email' => $request->email,
        // 'subject' => $request->subject,
        // 'phone' => $request->phone,
        // 'message' => $request->message,
        // 'created_at' => Carbon::now(),
        // ]);

        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contacts'));
    }

    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
