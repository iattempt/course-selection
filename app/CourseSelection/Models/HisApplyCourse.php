<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class HisApplyCourse extends Model
{
    //
    protected $fillable = [ 'student_id',
                            'course_id',
                            'professor_id'];
}
