<?php

namespace App\Selection;

use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Selection\User', 'user_id');
    }
    public function courses()
    {
        return $this->hasMany('App\Selection\Course');
    }
}
