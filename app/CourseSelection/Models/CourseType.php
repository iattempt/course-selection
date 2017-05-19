<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    //
    protected $fillable = [ 'course_id',
                            'unit_id',
                            'type_id'];
    public function type()
    {
        return $this->belongsTo('Model\Type', 'type_id');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit', 'unit_id');
    }
    public function course()
    {
        return $this->belongsTo('Model\Course', 'course_id');
    }
}
