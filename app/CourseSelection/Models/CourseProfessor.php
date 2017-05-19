<?php

namespace Model;

use App;
use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    //
    protected $fillable = [ 'course_id',
                            'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
}
