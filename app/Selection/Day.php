<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('App\Selection\CourseTime');
    }
}
