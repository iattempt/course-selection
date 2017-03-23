<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SyllabusController extends Controller
{
    //
    function index() {
        $data['title'] = "Syllabus";
        return view('student/state/syllabus', $data);
    }
}
