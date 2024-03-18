<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\SimpleMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function postContact(Request $request){
        $contact=Contact::create($request->all());
        Mail::to('Ksonra@mail.ru')->send(new SimpleMail($contact));
        return redirect('sendcontact');
    }
}
