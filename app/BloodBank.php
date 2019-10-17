<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function centre()
    {
        return $this->belongsTo('App\DonationCentre');
    }
}
