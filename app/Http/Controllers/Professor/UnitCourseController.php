<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitCourseController extends Controller
{
    //
    function index() {
        $data['title'] = "Unit course";
        return view('professor/unit_course', $data);
    }
}
