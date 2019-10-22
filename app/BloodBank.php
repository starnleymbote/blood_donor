<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $guarded = [];
    
    public function donation_center()
    {
        return $this->hasMany('App\DonationCenter');
    }

    public function centre()
    {
        return $this->belongsTo('App\DonationCentre');
    }
}
