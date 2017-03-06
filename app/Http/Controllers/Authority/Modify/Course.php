<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Course extends Controller
{
    //
    function index() {
        $data['title'] = "Modify course";
        return view('authority/modify/course', $data);
    }
}
