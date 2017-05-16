<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\CourseSelection\Models\User');
    }
    public function unit()
    {
        return $this->belongsTo('App\CourseSelection\Models\Unit');
    }
}
