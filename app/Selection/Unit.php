<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('App\Selection\Course');
    }
}
