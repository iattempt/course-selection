<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo('App\Selection\Unit', 'unit_id');
    }
}
