<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('App\CourseSelection\Models\CourseTime');
    }
}
