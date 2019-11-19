<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorDetails extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Blood_group()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function donation_center()
    {
        return $this->belongsTo('App\DonationCenter');
    }

    public function appointment()
    {
        return $this->hasOne('App\Appointment');
    }
}
