<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorRecords extends Model
{
    public function centers()
    {
        return $this->hasMany('App\DonationCenter');
    }
}
