<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutElective extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll out-elective";
        return view('student/selection/enroll/out_elective', $data);
    }
}
