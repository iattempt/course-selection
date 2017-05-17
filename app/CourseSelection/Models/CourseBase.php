<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseBase extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
}