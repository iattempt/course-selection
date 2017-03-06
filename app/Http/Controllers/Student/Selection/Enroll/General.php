<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class General extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll general";
        return view('student/selection/enroll/general', $data);
    }
}
