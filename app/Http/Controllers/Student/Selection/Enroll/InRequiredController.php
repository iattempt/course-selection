<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InRequiredController extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll in-required";
        return view('student/selection/enroll/in_required', $data);
    }
}
