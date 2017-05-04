<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\Selection\User');
    }
    public function unit()
    {
        return $this->belongsTo('App\Selection\Unit');
    }
}
