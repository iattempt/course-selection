<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InElective extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll in-elective";
        return view('student/selection/enroll/in_elective', $data);
    }
}
