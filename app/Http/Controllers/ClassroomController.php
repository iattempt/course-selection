<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classroom;

class ClassroomController extends Controller
{
    //
    function index() {
        $classrooms = classroom::all();
        return view('classroom', compact('classrooms'));
    }
}
