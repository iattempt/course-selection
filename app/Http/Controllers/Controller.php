<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $school;
    public function __construct () {
        $this->data['G_SCHOOL'] = "東海";
        $this->data['G_SCHOOL_CALANDER'] = "http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36";
        $this->data['G_SCHOOL_WEBSITE'] = "http://www.thu.edu.tw";
    }
}
