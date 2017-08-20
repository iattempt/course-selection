<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'unit_base_id',
    ];
}
