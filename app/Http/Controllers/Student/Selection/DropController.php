<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DropController extends Controller
{
    //
    function index() {
        $data['title'] = "Drop";
        return view('student/selection/drop', $data);
    }
}
