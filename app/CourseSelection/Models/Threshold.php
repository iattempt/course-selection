<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    //
    public function unit() {
        return $this->hasOne('Model\Unit');
    }
    public function type() {
        return $this->hasOne('Model\Type');
    }
    public function course_base() {
        return $this->hasOne('Model\CourseBase');
    }
}
