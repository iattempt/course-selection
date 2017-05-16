<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo('Model\Unit', 'unit_id');
    }
}
