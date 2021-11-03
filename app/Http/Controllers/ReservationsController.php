<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Carbon;
use Auth;
use Session;
use Stripe;
use PDF;
use Mail;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
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

        $authenticated_user = Auth::user();

        request()->validate([
            "check_in"=>'required | after:yesterday',
            "check_out"=>'required ',
        ]);
        $check_in_date = request('check_in');
        $check_out_date = request('check_out');

        $to_date = Carbon::createFromFormat('Y-m-d', $check_in_date);
        $from_date = Carbon::createFromFormat('Y-m-d', $check_out_date);

        $answer_in_days = $to_date->diffInDays($from_date);

        $new_reservation = new Reservation;
        
        $new_reservation->user_id = request('user_id');
        $new_reservation->check_in = request('check_in');
        $new_reservation->check_out = request('check_out');
        
        $new_reservation->save();

        $room = Room::findOrFail(request('room_id'));
        $new_reservation->reservations()->sync($room);
        $amount = request('amount');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $amount * 100 * $answer_in_days,
                "currency" => "zar",
                "source" => $request->stripeToken,
                "description" => "Booking payment" 
        ]);

        Session::flash('success', 'Payment successful. A booking confirmation has been sent to your email !');
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
        $total = $room->room_original_price * $answer_in_days;

        $pdf_data =[

            'title' => 'Thanks! Your booking is confirmed at Lake Breeze Hotel',
            'heading' => 'Booking Confirmation',
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
                        <h2>Booking Invoice </h2> <span>invoice no:{$new_reservation->id}00ABD</span> <br>
                        <table>
                        <tr>
                            <th>Company: Lake Breeze Hotel</th>
                            <th>Contact: admin@lbh.co.za</th>
                            <th>Country: South Africa</th>
                            <th></th>
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
                            <td>Number Of Days: {$answer_in_days}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                        <strong><h1>Total : R{$total} </h1></strong>
                        </tr>
                        </table>
        "];

        $pdf = PDF::loadView('booking_confirmation', $pdf_data);

        $data["email"] = $authenticated_user->email;
        $data["first_name"] = $authenticated_user->first_name;
        $data["last_name"] =  $authenticated_user->last_name;
        $data["title"] = "Hotel Reservation Confirmation";

        Mail::send('emails.reservationMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "reservation_confirmation.pdf");
        });
        return redirect()->route('rooms.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

   

   
}
