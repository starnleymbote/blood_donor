<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    // protected $guarded = [
    //     'role',
    // ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function donation_center()
    {
        return $this->belongsTo('App\DonationCenter');
    }

    public function blood_group()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function appointment()
    {
        return $this->belongsTo('App\Appointment');
    }

    public function donor_details()
    {
        return $this->hasOne('App\DonorDetails');
    }

    public function county()
    {
        return $this->hasOne('App\Counties');
    }

}
