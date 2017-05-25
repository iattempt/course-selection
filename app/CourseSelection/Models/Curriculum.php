<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    protected $fillable = [ 'student_id',
                            'course_id',
                            'state'];
    public function student()
    {
        return $this->belongsTo('Model\Student', 'student_id');
    }
    public function course()
    {
        return $this->belongsTo('Model\Course');
    }
}
