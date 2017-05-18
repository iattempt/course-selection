<?php

namespace Model;

use App;
use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    //
    protected $fillable = ['course_id', 'professor_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function courses()
    {
        return $this->hasMany('Model\Course');
    }
    public function create(array $inputs)
    {
        try {
            $this->course_id = $inputs['course_id'];
            $this->professor_id = $inputs['professor_id'];
            $this->save();
        } catch(\Exception $e) {
            dd($e);
        }
    }
}
