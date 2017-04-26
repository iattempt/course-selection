<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    //
    public function unit() {
        return $this->hasOne('App\Selection\Unit');
    }
    public function type() {
        return $this->hasOne('App\Selection\Type');
    }
    public function course_base() {
        return $this->hasOne('App\Selection\CourseBase');
    }
}
