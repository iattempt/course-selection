<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $general;

    public function __construct () {
        $this->general = new General();

        $this->general->school->name = "東海";
        $this->general->school->calender = "http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36";
        $this->general->school->website = "http://www.thu.edu.tw";
    }
}

Class General
{
    public $title;
    public $school; //School class
    public function __construct () {
        $this->school = new School();
    }
}

class School
{
    public $name;
    public $calender;
    public $website;
}
