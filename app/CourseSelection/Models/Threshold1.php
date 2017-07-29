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
                            'adopt_grade',
                            'adopt_semester'];
    public function unit() {
        return $this->belongsTo('Model\Unit');
    }
    public function type() {
        return $this->belongsTo('Model\Type');
    }
    public function course_base() {
        return $this->belongsTo('Model\CourseBase');
    }
}
