<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;

class CourseController extends ModifyController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Modify course";
    }
    function index() {
        return view('authority/modify/course', $this->data);
    }
}
