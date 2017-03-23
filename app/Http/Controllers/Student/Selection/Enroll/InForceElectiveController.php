<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InForceElectiveController extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll in-force-elective";
        return view('student/selection/enroll/in_force_elective', $data);
    }
}
