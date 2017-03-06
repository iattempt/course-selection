<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Recommendation extends Controller
{
    //
    function index() {
        $data['title'] = "Enroll recommendation";
        return view('student/selection/enroll/recommendation', $data);
    }
}
