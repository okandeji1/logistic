<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rider extends Model
{
    use SoftDeletes;

    public function bike()
    {
            return $this->hasOne(Bike::class);
    }

    public function accidents()
    {
            return $this->hasMany(Accident::class);
    }
    
}
