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
        $this->general->curricula = Curriculum::all()->where('student_id', Auth::user()->id);

        $this->passingRequestToView($request);
        $this->listRequest($request);
        $this->filterRequest($request);

        /*
        $test = Collect([[1,2],[3],[4,5]])->collapse();
        dd($test);

        $test = Type::all()->toArray();
        $t = Collect($test)->collapse();
        dd($t);
        foreach ($test as $t){
            dd($t);
            $t->toArray();
        }

        dd($test);
        dd(Type::all());
        */
        return view('common/course_search', ['general' => $this->general]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            $own = Curriculum::all()->filter(function($value, $key) {
                if($value->student_id == $this->general->info->id)
                    return $value;
            });
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
                    $c->save();
                }
            }
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->general->info = User::findOrFail(Auth::user()->id);
        $own = Curriculum::all()->filter(function ($value, $key) {
            if ($value->student_id == $this->general->info->id)
                return $value;
        });
        foreach ($own as $i) {
            if ($i->course->id == $id){
                $i->delete();
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
        $this->general->lists = Course::all();
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
        $this->filterUnit($request);
        $this->filterLanguage($request);
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
