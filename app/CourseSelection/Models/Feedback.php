<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'unit_id',
        'type_id',
        'course_base_id',
        'credit',
        'adopt_year',
        'default_grade',
        'default_semester',
    ];
}
