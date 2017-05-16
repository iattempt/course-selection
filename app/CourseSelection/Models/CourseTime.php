<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    //
    protected $table = "course_time";
    public function day()
    {
        return $this->belongsTo('Model\Day');
    }
    public function period()
    {
        return $this->belongsTo('Model\Period');
    }
    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
}
