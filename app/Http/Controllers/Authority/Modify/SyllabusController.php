<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SyllabusController extends Controller
{
    //
    function index() {
        $data['title'] = "Modify syllabus";
        return view('authority/modify/syllabus', $data);
    }
}
