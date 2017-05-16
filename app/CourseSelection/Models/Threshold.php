<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    //
    public function unit() {
        return $this->hasOne('App\CourseSelection\Models\Unit');
    }
    public function type() {
        return $this->hasOne('App\CourseSelection\Models\Type');
    }
    public function course_base() {
        return $this->hasOne('App\CourseSelection\Models\CourseBase');
    }
}
