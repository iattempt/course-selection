<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Prerequisite extends Model
{
    protected $fillable = [
        'course_id',
        'course_base_id',
    ];
}
