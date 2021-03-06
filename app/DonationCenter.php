<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationCenter extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $guarded = [];
    
    public function bloodbank()
    {
        return $this->hasMany('App\BloodBank');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function donor()
    {
        return $this->hasOne('App\DonorDetails');
    }

    public function county()
    {
        return $this->hasOne('App\Counties');
    }

    public function records()
    {
        return $this->belongsTo('App\DonorRecords');
    }
}
