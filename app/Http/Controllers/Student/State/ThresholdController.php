<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThresholdController extends Controller
{
    //
    function index(){
        $data['title'] = "Threshold";
        return view('student/state/threshold', $data);
    }
}
