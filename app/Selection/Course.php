<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function professors()
    {
        return $this->hasMany('App\Selection\CourseProfessor', 'course_id', 'id');
    }
    public function time()
    {
        return $this->hasMany('App\Selection\CourseTime');
    }
    public function types()
    {
        return $this->hasMany('App\Selection\CourseType');
    }
    public function unit()
    {
        return $this->belongsTo('App\Selection\Unit');
    }
    public function classroom()
    {
        return $this->belongsTo('App\Selection\Classroom');
    }
    public function course_base()
    {
        return $this->belongsTo('App\Selection\CourseBase');
    }
}
