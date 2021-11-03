<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact_us.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name"=>'required',
            "email"=>'required',
            "phone_number"=>'required',
            "message"=>'required',
        ]);

        $contact_us = new ContactUs;
        $contact_us->name = request('name');
        $contact_us->email = request('email');
        $contact_us->phone_number = request('phone_number');
        $contact_us->message = request('message');

        $contact_us->save();

        return redirect()->back()->with('message', 'Thank you for leaving us a message');
    }

}
