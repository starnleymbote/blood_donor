<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function blood_banks()
    {
        return $this->hasMany('App\BloodBank');
    }
}
