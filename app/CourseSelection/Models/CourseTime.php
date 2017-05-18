<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    //
    protected $fillable = ['course_id', 'day_id', 'period_id'];
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
    public function create(array $inputs)
    {
        try {
            $this->course_id = $inputs['course_id'];
            $this->period_id = $inputs['period_id'];
            $this->day_id = $inputs['day_id'];
            $this->save();
        } catch(\Exception $e) {
            dd($e);
        }
    }
}
