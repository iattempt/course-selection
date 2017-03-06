<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreSyllabus extends Controller
{
    //
    function index() {
        $data['title'] = "Pre-syllabus";
        return view('student/state/pre_syllabus', $data);
    }
}
