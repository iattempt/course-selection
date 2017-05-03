<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\Selection\User', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Selection\Unit');
    }
}
