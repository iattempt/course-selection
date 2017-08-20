<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    protected $fillable = [
        'course_id',
        'day_id',
        'period_id',
    ];

    public function day()
    {
        return $this->belongsTo('Model\Day');
    }

    public function period()
    {
        return $this->belongsTo('Model\Period');
    }

    public function course()
    {
        return $this->hasMany('Model\Course');
    }
}
