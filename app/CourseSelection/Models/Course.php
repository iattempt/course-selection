<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    //
    public function professors()
    {
        return $this->hasMany('Model\CourseProfessor', 'course_id', 'id');
    }
    public function time()
    {
        return $this->hasMany('Model\CourseTime');
    }
    public function types()
    {
        return $this->hasMany('Model\CourseType', 'course_id', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit');
    }
    public function classroom()
    {
        return $this->belongsTo('Model\Classroom');
    }
    public function course_base()
    {
        return $this->belongsTo('Model\CourseBase');
    }
}
