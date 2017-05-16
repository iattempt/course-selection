<?php

namespace App\CourseSelection\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
    public function student()
    {
        return $this->hasOne('App\CourseSelection\Models\Student', 'id');
    }
    public function professor()
    {
        return $this->hasOne('App\CourseSelection\Models\Professor', 'id');
    }



    public function isAuthority()
    {
        return $this->type == "authority" ? true : false;
    }

    public function isStudent()
    {
        return $this->type == "student" ? true : false;
    }

    public function isProfessor()
    {
        return $this->type == "professor" ? true : false;
    }

    public function getType()
    {
        return $this->type;
    }
}
