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
        'name', 'email', 'password',
    ];

<<<<<<< HEAD
    // protected $guarded = [
    //     'role',
    // ];
=======
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
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

<<<<<<< HEAD
    public function donation_center()
    {
        return $this->hasOne('App\DonationCenter');
    }

    public function blood_group()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function donor_details()
    {
        return $this->hasOne('App\DonorDetails');
=======
    public function appointments()
    {
        return $this->hasMany('App\User');
    }

    public function centre()
    {
        return $this->hasMany('App\DonationCentre');
    }

    public function bloodbank()
    {
        return $this->hasMany('App\BloodBank');
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
    }
}
