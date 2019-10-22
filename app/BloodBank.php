<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
<<<<<<< HEAD
    protected $guarded = [];
    
    public function donation_center()
    {
        return $this->hasMany('App\DonationCenter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
=======
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function centre()
    {
        return $this->belongsTo('App\DonationCentre');
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
    }
}
