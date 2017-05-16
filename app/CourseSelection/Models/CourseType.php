<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    //
    public function type()
    {
        return $this->belongsTo('App\CourseSelection\Models\Type', 'type_id');
    }
    public function unit()
    {
        return $this->belongsTo('App\CourseSelection\Models\Unit', 'unit_id');
    }
    public function courses()
    {
        return $this->belongsTo('App\CourseSelection\Models\Course', 'course_id');
    }
}
