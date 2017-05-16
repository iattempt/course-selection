<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('Model\CourseTime');
    }
}
