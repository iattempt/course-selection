<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Threshold2 extends Model
{
    //
    protected $fillable = [ 'unit_id',
                            'type_id',
                            'credit',
                            'adopt_year'];
    public function unit() {
        return $this->belongsTo('Model\Unit');
    }
    public function type() {
        return $this->belongsTo('Model\Type');
    }
}
