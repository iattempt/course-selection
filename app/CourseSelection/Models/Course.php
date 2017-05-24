<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [ 'name',
                            'course_base_id',
                            'unit_id',
                            'classroom_id',
                            'credit',
                            'language',
                            'year',
                            'semester',
                            'enrollment_remain',
                            'enrollment_max',
                            'enroll'];
    public function professors()
    {
        return $this->hasMany('Model\CourseProfessor');
    }
    public function times()
    {
        return $this->hasMany('Model\CourseTime');
    }
    public function types()
    {
        return $this->hasMany('Model\CourseType');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit');
    }
    public function classroom()
    {
        return $this->belongsTo('Model\Classroom');
    }
    public function course_base()
    {
        return $this->belongsTo('Model\CourseBase');
    }
}
