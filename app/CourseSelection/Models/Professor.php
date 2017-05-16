<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\CourseSelection\Models\User', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('App\CourseSelection\Models\Unit');
    }
}
