<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;

class StudentController extends ModifyController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Modify student";
    }
    function index() {
        return view('authority/modify/student', $this->data);
    }
}
