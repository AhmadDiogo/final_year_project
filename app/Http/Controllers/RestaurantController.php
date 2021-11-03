<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantPage;
use App\Models\Recipe;

use Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_info = RestaurantPage::first();
        $recipes = Recipe::all();
        return view('restaurant.index')->with('restaurant_info', $restaurant_info)
        ->with('recipes', $recipes);
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
            "date"=>'required',
            "time"=>'required|date_format:H:i',
            "guests_number"=>'required',
        ]);

        $restaurant_booking = new Restaurant;
        $restaurant_booking->date = request('date');
        $restaurant_booking->time = request('time');
        $restaurant_booking->guests_number = request('guests_number');
        $restaurant_booking->name = $authenticated_user->first_name;
        $restaurant_booking->phone_number = $authenticated_user->phone_number;

        $restaurant_booking->save();

        return redirect()->back()->with('message', 'Thank you for booking a seat!');

    }

}
