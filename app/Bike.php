<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use SoftDeletes;

    public function rider()
    {
        return $this->belongsTo(Rider::class, 'rider_id');
    }

    public function maintenance()
    {
            return $this->hasOne(Maintenance::class);
    }
}
