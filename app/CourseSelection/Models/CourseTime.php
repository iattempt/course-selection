<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    //
    protected $table = "course_time";
    public function day()
    {
        return $this->belongsTo('App\CourseSelection\Models\Day');
    }
    public function period()
    {
        return $this->belongsTo('App\CourseSelection\Models\Period');
    }
    public function courses()
    {
        return $this->hasMany('App\CourseSelection\Models\Course');
    }
}
