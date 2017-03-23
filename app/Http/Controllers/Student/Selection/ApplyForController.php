<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyForController extends Controller
{
    //
    function index() {
        $data['title'] = "Apply for";
        return view('student/selection/apply_for', $data);
    }
}
