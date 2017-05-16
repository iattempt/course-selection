<?php

namespace Model;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    //
    public function info()
    {
        return $this->belongsTo('App\User', 'id');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit');
    }
}
