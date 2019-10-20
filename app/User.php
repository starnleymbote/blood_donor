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
        return $this->hasMany('DonationCenter::class');
    }

    public function blood_type()
    {
            return $this->hasOne('App\BloodType');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function donor_details()
    {
        return $this->hasOne('App\DonorDetails');
    }
}
