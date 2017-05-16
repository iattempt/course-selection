<?php

namespace App\CourseSelection\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo('App\CourseSelection\Models\Unit', 'unit_id');
    }
}
