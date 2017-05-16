<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('App\CourseSelection\Models\Course');
    }
}
