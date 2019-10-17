<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationCentre extends Model
{
    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bloodbank()
    {
        return $this->belongsTo('App\BloodBank');
    }
}
