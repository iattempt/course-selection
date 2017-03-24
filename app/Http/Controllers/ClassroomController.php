<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ClassroomController extends Controller
{
    //
    function index() {
        $students = Student::all();
        return view('classroom', compact('students'));
    }
}
