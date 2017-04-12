<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\Selection\User');
    }
}
