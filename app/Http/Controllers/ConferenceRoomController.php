<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceRoom;

use Auth;
use Session;
use Stripe;
use PDF;
use Mail;

class ConferenceRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = ConferenceRoom::paginate(3);

        return view('conference_rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $room_id = request('room_id');

        $room = ConferenceRoom::findOrFail($room_id);
        $room->room_availability = '0';
        $room->save();

        $authenticated_user = Auth::user();
        $amount = request('amount');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "zar",
                "source" => $request->stripeToken,
                "description" => "Conference Booking payment" 
        ]);

        Session::flash('success', 'Payment successful. A booking confirmation for the conference room has been sent to your email !');
        $room->room_availability = "0";
        $room->save();

        $name = $authenticated_user->first_name;
        $surname = $authenticated_user->last_name;
        $country = $authenticated_user->country;
        $city = $authenticated_user->city;
        $email = $authenticated_user->email;
        $phone_number = $authenticated_user->phone_number;

        $check_in = request('check_in');
        $check_out = request('check_out');

        $pdf_data =[

            'title' => 'Thanks! Your booking is confirmed at Lake Breeze Hotel',
            'heading' => 'Conference Room Booking Confirmation',
            'content' => "
                        <style>
                        table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                        }
                        
                        td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                        }
                        
                        tr:nth-child(odd) {
                        background-color: #dddddd;
                        }
                        </style>
                        </head>
                        <body>
                        <h2>Booking Invoice </h2> <span>invoice no:{$room_id}00ABD</span> <br>
                        <table>
                        <tr>
                            <th>Company: Lake Breeze Hotel</th>
                            <th>Contact: admin@lbh.co.za</th>
                            <th>Country: South Africa</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Customer Name: {$name} {$surname} </td>
                            <td>Country: {$country}</td>
                            <td>City: {$city}</td>
                            <td>Email: {$email}</td>
                            <td>Phone Number: {$phone_number}</td>
                        </tr>
                        <tr>
                            <td>Check In Date : {$check_in}</td>
                            <td>Check Out Date: {$check_out}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                        <strong><h1>Total : R{$room->room_price} </h1></strong>
                        </tr>
                        </table>
        "];

        $pdf = PDF::loadView('conference_room_booking_confirmation', $pdf_data);

        $data["email"] = $authenticated_user->email;
        $data["first_name"] = $authenticated_user->first_name;
        $data["last_name"] =  $authenticated_user->last_name;
        $data["title"] = "Conference Room Reservation Confirmation";

        Mail::send('emails.reservationMail2', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "conference_room_reservation_confirmation.pdf");
        });
        return redirect()->route('conference_rooms.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $room = ConferenceRoom::findOrFail($id);
        return view('conference_rooms.show')->with('room', $room);
    }
    
}