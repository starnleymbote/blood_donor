<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $guarded = [];
    
    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function centre()
    {
        return $this->belongsTo('App\DonationCenter','center_id','');
    }
}
