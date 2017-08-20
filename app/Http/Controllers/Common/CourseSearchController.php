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
    public function __construct () {
        parent::__construct();
        $this->general->title = 'course search';
    }

    public function index(Request $request) {
        $this->general->identity = Auth::user()->getType();

        $this->general->info = User::findOrFail(Auth::user()->id);
        $this->general->days = $this->day->instance()->get();
        $this->general->periods = $this->period->instance()->get();
        $this->general->types = $this->type->instance()->suitFilter()->get();
        $this->general->units = $this->unit->instance()->suitRegister()->get();
        if ($this->general->identity == 'student') {
            $this->general->pre_curriculum = $this->curriculum->instance()->suitOwn(Auth::user()->id);
            $this->general->pre_curriculum = $this->general->pre_curriculum->suitPre()->get();
        }

        $this->passingRequestToView($request);
        $this->general->lists = $this->course->instance();
        $this->listRequest($request);
        $this->filterRequest($request);

        if (!$request->has('semesters'))
            $this->general->lists = $this->general->lists->suitCurrentSemester();

        $this->general->lists = $this->general->lists->get();

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
                foreach ($courses as $j)
                    if ($i->id == $j->id)
                        if ($j->enrollment_remain>0) {
                            $j->enrollment_remain--;
                            $j->save();
                            $isSecurity = true;
                        }
                //
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

    public function passingRequestToView($request)
    {
        if ($request->input('flash') == 'yes')
            $request->flashExcept('flash');
        else 
            $request->flashOnly('flash');
    }

    public function listRequest(Request $request)
    {
        $this->general->request_lists = "";

        if ($request->has('professorName')) {
            $this->general->request_lists .= "教授名字: [ ";
            $this->general->request_lists .= $request->input('professorName');
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('courseName')) {
            $this->general->request_lists .= "課程名稱: [ ";
            $this->general->request_lists .= $request->input('courseName');
            $this->general->request_lists .= " ] ";
        }
        if ($request->has('enroll')) {
            $this->general->request_lists .= "加選狀況: [ ";
            $this->general->request_lists .= ($request->input('enroll') ? "可加選" : "不可加選");
            $this->general->request_lists .= " ] ";
        }

        $this->general->request_lists .= "開課學期: [ ";
        if ($request->has('semesters')) {
            foreach ($request->input('semesters') as $semester) {
                $ys = explode(' ', $semester);
                $y = $ys[0];
                $s = $ys[1];
                $this->general->request_lists .= $y."-".$s . " / ";
            }
        } else {
            $this->general->request_lists .= env('CURRENT_YEAR')."-".env('CURRENT_SEMESTER') . " / ";
        }
        $this->general->request_lists .= " ] ";

        if ($request->has('types')) {
            $this->general->request_lists .= "修別: [ ";
            foreach ($request->input('types') as $t)
                foreach ($this->general->types as $type)
                    if ($type->id == $t)
                        $this->general->request_lists .= $type->name . " / ";

            $this->general->request_lists .= " ] ";
        }
        if ($request->has('times')) {
            $this->general->request_lists .= "時段: [ ";
            foreach ($request->input('times') as $t) {
                $dp = explode(' ', $t);
                $d = $dp[0];
                $p = $dp[1];
                foreach ($this->general->days as $day)
                    if ($day->id == $d)
                        $this->general->request_lists .= $day->name . ':';

                foreach ($this->general->periods as $period)
                    if ($period->id == $p)
                        $this->general->request_lists .= $period->name . " / ";
            }

            $this->general->request_lists .= " ] ";
        }
        if ($request->has('units')) {
            $this->general->request_lists .= "開課單位:[ ";
            foreach ($request->input('units') as $u)
                foreach ($this->general->units as $unit)
                    if ($unit->id == $u)
                        $this->general->request_lists .= $unit->name . " / ";

            $this->general->request_lists .= " ] ";
        }
        if ($request->has('languages')) {
            $this->general->request_lists .= "授課語言:[ ";
            foreach ($request->input('languages') as $t)
                $this->general->request_lists .= $t . " / ";

            $this->general->request_lists .= " ] ";
        }
    }

    public function filterRequest(Request $request)
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

    public function filterProfessorName(Request $request)
    {
        if ($request->has('professorName'))
            $this->general->lists = $this->general->lists->suitProfessorName($request->input('professorName'));
    }

    public function filterCourseName(Request $request)
    {
        if ($request->has('courseName'))
            $this->general->lists = $this->general->lists->suitCourseName($request->input('courseName'));
    }

    public function filterEnroll(Request $request)
    {
        if ($request->has('enroll'))
            $this->general->lists = $this->general->lists->suitEnroll($request->input('enroll'));
    }

    public function filterSemester(Request $request)
    {
        if ($request->has('semesters'))
            $this->general->lists = $this->general->lists->suitSemesters($request->input('semesters'));
    }

    public function filterType(Request $request)
    {
        if ($request->has('types'))
            $this->general->lists = $this->general->lists->suitTypes($this->general->info->student->unit->id, $request->input('types'));
    }

    public function filterTime(Request $request)
    {
        if ($request->has('times'))
            $this->general->lists = $this->general->lists->suitTimes($request->input('times'));
    }

    public function filterUnit(Request $request)
    {
        if ($request->has('units'))
            $this->general->lists = $this->general->lists->suitUnits($request->input('units'));
    }

    public function filterLanguage(Request $request)
    {
        if ($request->has('languages'))
            $this->general->lists = $this->general->lists->suitLanguages($request->input('languages'));
    }
}
