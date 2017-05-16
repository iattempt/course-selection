<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\CourseSelection\Models\User', 'user_id');
    }
    public function courses()
    {
        return $this->hasMany('App\CourseSelection\Models\Course');
    }
}
