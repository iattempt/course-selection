<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class CourseBase extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('App\Selection\Course');
    }
}
