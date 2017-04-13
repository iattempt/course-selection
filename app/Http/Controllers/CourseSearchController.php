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
use App\Selection\Day;
use App\Selection\Period;
use App\Selection\Type;
use App\Selection\Professor;

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

            $this->general->info = User::find(Auth::user()->id);
            $this->general->days = Day::orderby('id', 'asc')->get();
            $this->general->periods = Period::orderby('id', 'asc')->get();
            $this->general->types = Type::orderby('name', 'asc')->get();
            $this->general->units = Unit::orderby('subjection', 'asc')->get();
            //$this->general->lists = Course::where('unit_id', '=', User::find(Auth::user()->id)->student->unit_id)->get();

            var_dump($request->all());
            $this->general->lists = Course::with('professors')->where('name', 'like', "%{$request->input('professorName')}%");
            $this->general->lists = $this->general->lists->get();

            return view('course_search', ['general' => $this->general]);
        }
        return redirect('sign_in');
    }
    function filterDay()
    {
    
    }

}
