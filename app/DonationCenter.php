<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationCenter extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function blood_bank()
    {
        return $this->belongsTo('App\BloodBank');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
