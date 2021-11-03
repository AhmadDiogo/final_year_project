<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwimmingPool;
use Session;
use Auth;

class SwimmingPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('swimming_pool');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "date"=>'required',
            "time"=>'required|date_format:H:i',
            "guests_number"=>'required',
        ]);
        
        $authenticated_user = Auth::user();

        $pool_booking = new SwimmingPool;
        $pool_booking->date = request('date');
        $pool_booking->time = request('time');
        $pool_booking->guests_number = request('guests_number');
        $pool_booking->name = $authenticated_user->first_name;
        $pool_booking->phone_number = $authenticated_user->phone_number;

        $pool_booking->save();

        return redirect()->back()->with('message', 'Thank you for booking the swimming pool!');
    }

}
