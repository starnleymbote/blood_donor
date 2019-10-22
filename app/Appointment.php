<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

<<<<<<< HEAD
    public function donation_center()
    {
        return $this->belongsTo('App\DonationCenter');
=======
    public function centre()
    {
        return $this->belongsTo('App\DonationCentre');
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
    }
}
