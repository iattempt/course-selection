<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\Selection\Student');
    }
    public function course()
    {
        return $this->belongsTo('App\Selection\Course');
    }
}
