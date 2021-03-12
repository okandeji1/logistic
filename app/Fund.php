<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model
{
    use SoftDeletes;

    public function sla()
    {
        return $this->belongsTo(SLA::class, 'sla_id');
    }
}
