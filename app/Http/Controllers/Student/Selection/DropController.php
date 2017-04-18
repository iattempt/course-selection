<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Student\SelectionController;
use App\Selection\Course;
use App\Selection\Curriculum;
use App\Selection\CourseProfessor;
use App\Selection\CourseTime;
use App\Selection\CourseBase;
use App\Selection\CourseType;
use App\Selection\Unit;
use App\Selection\User;
use App\Selection\Day;
use App\Selection\Period;
use App\Selection\Type;

class DropController extends SelectionController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Drop";
    }
    function index(Request $request) {
            $this->general->identity = Auth::user()->getType();
            $this->general->info = User::find(Auth::user()->id);
            $this->general->days = Day::orderby('id', 'asc')->get();
            $this->general->periods = Period::orderby('id', 'asc')->get();
            $this->general->types = Type::orderby('name', 'asc')->get();
            $this->general->units = Unit::orderby('subjection', 'asc')->get();
        $this->general->info = User::find(Auth::user()->id);
        $this->general->lists = Curriculum::all()->filter(function($value, $key){
            if ($value->student_id == Auth::user()->id) {
                return $value;
            }
        });
        var_dump($this->general->lists);
        
        return view('student/selection/drop', ['general' => $this->general]);
    }
}
