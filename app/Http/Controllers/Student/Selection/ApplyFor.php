<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyFor extends Controller
{
    //
    function index() {
        $data['title'] = "Apply for";
        return view('student/selection/apply_for', $data);
    }
}
