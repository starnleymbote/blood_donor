<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCounties extends Model
{
    protected $guarded = [];
    
    public function counties()
    {
        return $this->hasOne('App\Counties');
    }
}
