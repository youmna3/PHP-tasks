<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //
    function contact()
    {
        return view('contact');
    }
    function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message_text' => 'required'
        ]);
        Mail::to('youmna54@gmail.com@')->send(new ContactMail($request->all()));

        return redirect()->route('contact')->with('success', 'Email has been send successfully!');
    }
}