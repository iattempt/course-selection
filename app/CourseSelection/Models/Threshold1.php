<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Threshold1 extends Model
{
    //
    protected $table = 'thresholds';
    protected $fillable = [ 'unit_id',
                            'type_id',
                            'course_base_id',
                            'adopt_year',
                            'default_grade',
                            'default_semester'];
    public function unit() {
        return $this->hasOne('Model\Unit');
    }
    public function type() {
        return $this->hasOne('Model\Type');
    }
    public function course_base() {
        return $this->hasOne('Model\CourseBase');
    }
}
