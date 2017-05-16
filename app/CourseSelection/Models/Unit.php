<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
}
