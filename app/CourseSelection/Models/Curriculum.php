<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\CourseSelection\Models\Student', 'student_id');
    }
    public function course()
    {
        return $this->belongsTo('App\CourseSelection\Models\Course', 'course_id');
    }
}
