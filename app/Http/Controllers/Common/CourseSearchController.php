<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Model\Course;
use Model\CourseProfessor;
use Model\Curriculum;
use Model\CourseTime;
use Model\CourseBase;
use Model\CourseType;
use Model\Unit;
use Model\Day;
use Model\Period;
use Model\Type;
use App\User;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'course search';
    }
    function index(Request $request) {
        $this->general->identity = Auth::user()->getType();

        $this->general->info = User::findOrFail(Auth::user()->id);
        $this->general->days = Day::all()->sortBy('id');
        $this->general->periods = Period::all()->sortBy('id');
        $this->general->types = Type::all()->sortBy('name');
        $this->general->units = Unit::all();
        if ($this->general->identity == 'student') {
            $this->general->pre_curriculum = $this->curriculum->instance()->suitOwn(Auth::user()->id);
            $this->general->pre_curriculum = $this->general->pre_curriculum->suitPre()->get();
        }

        $this->passingRequestToView($request);
        $this->general->lists = $this->course->instance();
        $this->listRequest($request);
        $this->filterRequest($request);

        $this->general->lists = $this->course->get();

        return view('common/course_search', ['general' => $this->general]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('reg_enroll')) {
            $this->general->info = User::findOrFail(Auth::user()->id);

            $courses = Course::all();
            //搜尋自身預選課程
            $own = $this->curriculum->instance()->suitPreSelection()->suitOwn($this->general->info->id)->get();
            $own = $own->keyBy('course_id')->keys()->toArray();
            //申請加選課程
            $req = $request->input('reg_enroll');
            //過濾課程
            $new_enroll = Course::all()->only($req)->except($own);
            //可否加選
            foreach ($new_enroll as $i) {
                $isSecurity = false;
                foreach ($courses as $j) {
                    if ($i->id == $j->id) {
                        if ($j->enrollment_remain>0) {
                            $j->enrollment_remain--;
                            $j->save();
                            $isSecurity = true;
                        }
                    }
                }
                //登陸課表
                if ($isSecurity) {
                    $c = new Curriculum;
                    $c->course_id = $i->id;
                    $c->student_id = $this->general->info->id;
                    $c->state = "預選中";
                    $c->save();
                }
            }
        }
        return back()->withInput();
    }

    function passingRequestToView($request)
    {
        if ($request->input('flash') === 'yes')
            $request->flashExcept('flash');
    }

    function listRequest(Request $request)
    {
        $this->general->request_lists = "";

        if ($request->has('professorName')) {
            $this->general->request_lists .= "教授名字: [";
            $this->general->request_lists .= $request->input('professorName') . " ] ";
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('courseName')) {
            $this->general->request_lists .= "課程名稱: [";
            $this->general->request_lists .= $request->input('courseName');
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('enroll')) {
            $this->general->request_lists .= "加選狀況: [ ";
            $this->general->request_lists .= ($request->input('enroll') ? "可加選" : "不可加選");
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('type')) {
            $this->general->request_lists .= "修別:[ ";
            foreach ($request->input('type') as $t)
                $this->general->request_lists .= $t . " / ";
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('time')) {
            $this->general->request_lists .= "時段:[ ";
            foreach ($request->input('time') as $t)
                $this->general->request_lists .= $t . " / ";
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('unit')) {
            $this->general->request_lists .= "開課單位:[ ";
            foreach ($request->input('unit') as $t)
                $this->general->request_lists .= $t . " / ";
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('language')) {
            $this->general->request_lists .= "授課語言:[ ";
            foreach ($request->input('language') as $t)
                $this->general->request_lists .= $t . " / ";
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('semester')) {
            $this->general->request_lists .= "開課學期:[ ";
            $this->general->request_lists .= $request->input('semester');
            $this->general->request_lists .= " ] ";
        }
    }

    function filterRequest(Request $request)
    {
        $this->filterProfessorName($request);
        $this->filterCourseName($request);
        $this->filterEnroll($request);
        $this->filterType($request);
        $this->filterTime($request);
        $this->filterUnit($request);  //error
        $this->filterLanguage($request);
        $this->filterSemester($request);
    }

    function filterProfessorName(Request $request)
    {
        if ($request->has('professorName'))
            $this->general->lists = $this->general->lists->suitProfessorName($request->input('professorName'));
    }
    function filterCourseName(Request $request)
    {
        if ($request->has('courseName'))
            $this->general->lists = $this->general->lists->suitCourseName($request->input('courseName'));
    }
    function filterEnroll(Request $request)
    {
        if ($request->has('enroll'))
            $this->general->lists = $this->general->lists->suitEnroll($request->input('enroll'));
    }
    function filterType(Request $request)
    {
        if ($request->has('type'))
            $this->general->lists = $this->general->lists->suitTypes($this->general->info->student->unit->id, $request->input('type'));
    }
    function filterTime(Request $request)
    {
        if ($request->has('time'))
            $this->general->lists = $this->general->lists->suitTimes($request->input('time'));
    }
    function filterUnit(Request $request)
    {
        if ($request->has('unit'))
            $this->general->lists = $this->general->lists->suitUnits($request->input('unit'));
    }
    function filterLanguage(Request $request)
    {
        if ($request->has('language'))
            $this->general->lists = $this->general->lists->suitLanguage($request->input('language'));
    }
    function filterSemester(Request $request)
    {
        if ($request->has('semester'))
            $this->general->lists = $this->general->lists->suitSemester($request->input('semester'));
    }
}
