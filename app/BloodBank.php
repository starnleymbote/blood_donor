<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    public function donation_center()
    {
        return $this->hasMany('App\DonationCenter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
