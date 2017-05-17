<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Student\SelectionController;
use Model\Course;
use Model\CourseProfessor;
use Model\CourseTime;
use Model\CourseBase;
use Model\CourseType;
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
        $this->general->days = $this->day->instance()->get();
        $this->general->periods = $this->period->instance->get();
        $this->general->types = $this->type->instance->get();
        $this->general->units = $this->unit->instance->get();
        $this->general->curricula = $this->curriculum->instance()->suitOwn(Auth::User()->id);
        $this->general->lists = Course::all();
        
        return view('student/selection/drop', ['general' => $this->general]);
    }
    function destroy($id)
    {
        $own = $this->curriculum->own(Auth::User()->id);
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
}
