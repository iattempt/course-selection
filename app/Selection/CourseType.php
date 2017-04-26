<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    //
    public function type()
    {
        return $this->belongsTo('App\Selection\Type', 'type_id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Selection\Unit', 'unit_id');
    }
    public function courses()
    {
        return $this->belongsTo('App\Selection\Course', 'course_id');
    }
}
