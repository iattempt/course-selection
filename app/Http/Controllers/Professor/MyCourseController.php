<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyCourseController extends Controller
{
    //
    function index() {
        $data['title'] = "My course";
        return view('professor/my_course', $data);
    }
}
