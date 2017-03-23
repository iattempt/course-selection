<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseBaseController extends Controller
{
    //
    function index() {
        $data['title'] = "Modify course-base";
        return view('authority/modify/course_base', $data);
    }
}
