<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    //
    protected $table = "course_time";
    public function day()
    {
        return $this->belongsTo('App\Selection\Day');
    }
    public function period()
    {
        return $this->belongsTo('App\Selection\Period');
    }
    public function courses()
    {
        return $this->hasMany('App\Selection\Course');
    }
}
