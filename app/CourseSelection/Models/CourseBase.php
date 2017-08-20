<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class CourseBase extends Model
{
    protected $fillable = [
        'name',
        'credit',
    ];

    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
}
