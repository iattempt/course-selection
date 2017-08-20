<?php

namespace Model;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    protected $fillable = [
        'id',
        'title',
        'skills',
        'unit_id',
    ];

    public function info()
    {
        return $this->belongsTo('App\User');
    }

    public function unit()
    {
        return $this->belongsTo('Model\Unit');
    }
}
