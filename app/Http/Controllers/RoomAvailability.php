<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomAvailability extends Controller
{
    public function availability(Request $request)
    {
        $rooms = Room::where('room_availability', 1)->get();
        $check_in = request('check_in');
        $check_out = request('check_out');
        $room_type = request('room_type');

        return view('room_availability.index')->with('rooms', $rooms)->with('check_in', $check_in)
        ->with('rooms', $rooms)->with('check_out', $check_out)->with('room_type', $room_type);
    }
}
