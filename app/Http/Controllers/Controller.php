<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Selection\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $general;
    public function __construct () {
        $this->general = new General();
        $this->general->identity = "";
        $this->general->my_unit;
        $this->general->view_path = "/";

        $this->general->school = new School();
        $this->general->school->name = "東海";
        $this->general->school->calender = "http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36";
        $this->general->school->website = "http://www.thu.edu.tw";
    }
    public function getUsers($type)
    {
        $u = User::all()->filter(function ($value, $key) use($type){
            if($value->type == $type)
                return $value;
        });
        return $u;
    }
}

Class General
{
    public $title;
    public $identity;
    public $my_unit;
    public $school; //School class
    public $errors;

    public function __construct () {
    }
}

class School
{
    public $name;
    public $calender;
    public $website;
    
    public function __construct () {
    }
}
