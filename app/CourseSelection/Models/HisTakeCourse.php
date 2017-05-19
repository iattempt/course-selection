<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class HisTakeCourse extends Model
{
    //
    protected $fillable = [ 'student_id',
                            'course_id'];
}
