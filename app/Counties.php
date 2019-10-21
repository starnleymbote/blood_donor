<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counties extends Model
{
    protected $guarded = [];
    
    public function subcounties()
    {
        return $this->hasMany('App\SubCounties');
    }
}
