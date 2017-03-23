<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    //
    function index() {
        $data['title'] = "Modify student";
        return view('authority/modify/student', $data);
    }
}
