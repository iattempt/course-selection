<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Student\SelectionController;
use Model\Course;
use Model\Curriculum;
use Model\CourseProfessor;
use Model\CourseTime;
use Model\CourseBase;
use Model\CourseType;
use Model\Unit;
use Model\Day;
use Model\Period;
use Model\Type;
use App\User;

class DropController extends SelectionController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Drop";
        $this->general->view_path .= "/drop";
    }
    function index(Request $request) {
        $this->general->identity = Auth::user()->getType();
        $this->general->info = User::find(Auth::user()->id);
        $this->general->days = Day::all()->sortBy('id');
        $this->general->periods = Period::all()->sortBy('id');
        $this->general->types = Type::all()->sortBy('name');
        $this->general->units = Unit::all()->sortBy('unit_base_id');
        $this->general->info = User::find(Auth::user()->id);
        $own = $this->getOwnCurricula();
        $own = $own->keyBy('course_id')->keys()->toArray();
        $this->general->lists = Course::all()->only($own);
        $this->general->curricula = $this->getOwnCurricula();
        
        return view('student/selection/drop', ['general' => $this->general]);
    }
    function destroy($id)
    {
        $own = $this->getOwnCurricula(); 
        $req = Course::all()->only($id);

        foreach ($own as $o) {
            foreach($req as $r)
                if ($o->course_id === $r->id) {
                    $own->find($o->id)->delete();
                    $r->enrollment_remain++;
                    $r->save();
                }
        }
        return back()->withInput();
    }
    function getOwnCurricula()
    {
        $this->general->info = User::find(Auth::user()->id);
        $own = Curriculum::all()->filter(function($value, $key){
            if ($value->student_id == $this->general->info->id) {
                return $value;
            }
        });
        return $own;
    }
}
