<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Selection\Course;
use App\Selection\CourseProfessor;
use App\Selection\CourseTime;
use App\Selection\CourseBase;
use App\Selection\CourseType;
use App\Selection\Unit;
use App\Selection\User;
use App\Selection\Day;
use App\Selection\Period;
use App\Selection\Type;

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
            //var_dump($request->all());

            $this->general->lists = Course::all();
            $this->general->request_lists = "";

            $this->listRequest($request);
            $this->filterRequest($request);

            return view('course_search', ['general' => $this->general]);
        }
        return redirect('sign_in');
    }

    function listRequest(Request $request)
    {
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
        if ($request->has('mooc')) {
            $this->general->request_lists .= "MOOC課程:[ ";
            foreach ($request->input('mooc') as $t)
                $this->general->request_lists .= ($t ? "是" : "否") . " / ";
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
        $this->filterUnit($request);
        $this->filterLanguage($request);
        $this->filterMooc($request);
        $this->filterSemester($request);
    }

    function filterProfessorName(Request $request)
    {
        if ($request->has('professorName')) {
            $this->general->lists = $this->general->lists->filter(function($value, $key) use ($request) {
                foreach ($value->professors as $p)
                    if (strstr($p->user->name, $request->input('professorName')))
                        return $value;
                return false;
            });
        }
    }
    function filterCourseName(Request $request)
    {
        if ($request->has('courseName')) {
            $this->general->lists = $this->general->lists->filter(function($value, $key) use($request) {
                return strstr($value->name, $request->input('courseName'));
            });
        }
    }
    function filterEnroll(Request $request)
    {
        if ($request->has('enroll'))
            $this->general->lists = $this->general->lists->filter(function($value, $key) use($request){
                return $value->enroll == $request->input('enroll');
            });
    }
    function filterType(Request $request)
    {
        //尚未完成
        if ($request->has('type')) {
            $this->general->lists = $this->general->lists->filter(function($value, $key) use($request) {
                foreach ($request->input('type') as $rt) {
                    $hasMyUnit = false;
                    foreach ($value->types as $vt) {
                        if ($vt->unit->name == $this->general->info->student->unit->name)
                            $hasMyUnit = true;
                        if (($vt->unit->name == $this->general->info->student->unit->name) && ($vt->type->name == $rt))
                            return $value;
                    }
                    if (!$hasMyUnit)
                        foreach ($value->types as $vt) {
                            if (($vt->unit->name == "其餘") && ($vt->type->name == $rt))
                                return $value;
                        }
                }
            });
        }
    }
    function filterTime(Request $request)
    {
        if ($request->has('time')) {
            $this->general->lists = $this->general->lists->filter(function($value, $key) use($request){
                foreach ($request->input('time') as $rt) {
                    $dp = explode(' ', $rt);
                    $day = $dp[0];  $period = $dp[1];
                    foreach ($value->time as $vt) {
                        if ($vt->day->name == $day && $vt->period->name == $period)
                            return $value;
                    }
                }
            });
        }
    }
    function filterUnit(Request $request)
    {
        if ($request->has('unit')) {
            $this->general->lists = $this->general->lists->filter(function($value, $key) use($request){
                foreach ($request->unit as $u) {
                    if ($value->unit->name == $u)
                        return $value;
                }
            });
        }
    }
    function filterLanguage(Request $request)
    {
        if ($request->has('language')) {
            $this->general->lists = $this->general->lists->whereIn('language', $request->input('language'));
        }
    }
    function filterMooc(Request $request)
    {
        if ($request->has('mooc')) {
            $this->general->lists = $this->general->lists->whereIn('mooc', $request->input('mooc'));
        }
    }
    function filterSemester(Request $request)
    {
        if ($request->has('semester')) {
            $ys = explode(' ', $request->input('semester'));
            $y = $ys[0];    $s = $ys[1];
            $this->general->lists = $this->general->lists->where('year', '=', $y);
            $this->general->lists = $this->general->lists->where('semester', '=', $s);
        }
    }
}
