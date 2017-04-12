<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Selection\Course;
use App\Selection\CourseTime;
use App\Selection\CourseBase;
use App\Selection\CourseType;
use App\Selection\Unit;
use App\Selection\User;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'course search';
    }
    function index(Request $request) {
        if (Auth::check()) {
            $this->general->identity = Auth::user()->getType();

            $test = CourseType::where('unit_id', '=', User::find(Auth::user()->id)->student->unit_id)->get();
            foreach ($test as $t)
                var_dump($t->courses->name);
        }
    }

}
