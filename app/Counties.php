<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counties extends Model
{
    protected $guarded = [];
    
    public function subcounties()
    {
        return $this->belongsTo('App\SubCounties');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
