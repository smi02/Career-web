<?php

namespace App\Http\Controllers;

use App\Mail\ContactPoster;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create() {
        return view('contacts.contact');
    }

    public function store() {

        request()->validate([
            'name_con' => ['required', 'min:3'],
            'email_con' => ['required', 'email'],
            'message' => ['required']
        ]);
        
        $con = Contact::create([
            'name_con' => request('name_con'),
            'email_con' => request('email_con'),
            'message' => request('message'),
        ]);

        Mail::to($con->email_con)->queue(new ContactPoster($con));

        return redirect('/');
    }
}

