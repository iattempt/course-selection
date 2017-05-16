<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    //
    public function type()
    {
        return $this->belongsTo('Model\Type', 'type_id');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit', 'unit_id');
    }
    public function courses()
    {
        return $this->belongsTo('Model\Course', 'course_id');
    }
}
