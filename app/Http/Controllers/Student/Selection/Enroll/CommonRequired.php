<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonRequired extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll common required";
        return view('student/selection/enroll/common_required', $data);
    }
}
