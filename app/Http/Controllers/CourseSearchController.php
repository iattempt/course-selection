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
            $this->general->lists = Course::take(20);
            
            $this->checkRequest($request);

            $this->general->lists = $this->general->lists->get();
            return view('course_search', ['general' => $this->general]);
        }
        return redirect('sign_in');
    }
    function checkRequest(Request $request)
    {
        $this->checkCourseName($request);
        $this->checkEnroll($request);
        $this->checkLanguage($request);
        $this->checkMooc($request);
        $this->checkSemester($request);
    }
    function checkEnroll(Request $request)
    {
        if ($request->has('enroll'))
            $this->general->lists = $this->general->lists->where('can_enroll', '=', $request->input('enroll'));
    }
    function checkCourseName(Request $request)
    {
        if ($request->has('courseName'))
            $this->general->lists = $this->general->lists->where('name', 'like', "%{$request->input('courseName')}%");
    }
    function checkLanguage(Request $request)
    {
        if ($request->has('language')) {
            $this->general->lists = $this->general->lists->whereIn('language', $request->input('language'));
        }
    }
    function checkMooc(Request $request)
    {
        if ($request->has('mooc')) {
            $this->general->lists = $this->general->lists->whereIn('mooc', $request->input('mooc'));
        }
    }
    function checkSemester(Request $request)
    {
        if ($request->has('semester')) {
            $ys = explode(' ', $request->input('semester'));
            $y = $ys[0];
            $s = $ys[1];
            $this->general->lists = $this->general->lists->where('year', '=', $y);
            $this->general->lists = $this->general->lists->where('semester', '=', $s);
        }
    }
}
