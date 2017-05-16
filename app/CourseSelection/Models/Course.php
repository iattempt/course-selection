<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    //
    public function professors()
    {
        return $this->hasMany('App\CourseSelection\Models\CourseProfessor', 'course_id', 'id');
    }
    public function time()
    {
        return $this->hasMany('App\CourseSelection\Models\CourseTime');
    }
    public function types()
    {
        return $this->hasMany('App\CourseSelection\Models\CourseType', 'course_id', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('App\CourseSelection\Models\Unit');
    }
    public function classroom()
    {
        return $this->belongsTo('App\CourseSelection\Models\Classroom');
    }
    public function course_base()
    {
        return $this->belongsTo('App\CourseSelection\Models\CourseBase');
    }
}
