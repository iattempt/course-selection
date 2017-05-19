<?php

namespace Model;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    protected $fillable = [ 'id',
                            'year',
                            'state',
                            'unit_id'];
    public function info()
    {
        return $this->belongsTo('App\User');
    }
    public function unit()
    {
        return $this->belongsTo('Model\Unit');
    }
}
