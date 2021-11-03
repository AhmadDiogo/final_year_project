<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reservations()
    {
        return $this->belongsToMany('App\Models\Room')->withTimestamps();;
    }
}
