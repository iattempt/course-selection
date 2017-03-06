<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Schedule extends Controller
{
    //
    function index(){
        $data['title'] = "Schedule";
        return view('student/state/schedule', $data);
    }
}
