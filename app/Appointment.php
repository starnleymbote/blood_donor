<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function donor()
    {
        return $this->belongsTo('App\DonorDetails');
    }

    public function donation_center()
    {
        return $this->belongsTo('App\DonationCenter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
