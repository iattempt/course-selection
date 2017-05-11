<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\Selection\Course;
use App\Selection\Unit;
use App\Selection\CourseBase;
use App\Selection\Classroom;
use App\Selection\User;
use App\Selection\Period;
use App\Selection\Day;
use App\Selection\Type;

class CourseController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify course';
        $this->general->view_path .= '/course';
        $this->general->lists =  Course::all();
        $this->general->units =  Unit::all();
        $this->general->course_bases =  CourseBase::all();
        $this->general->classrooms = Classroom::all();
        $this->general->days = Day::orderby('id', 'asc')->get();
        $this->general->periods = Period::orderby('id', 'asc')->get();
        $this->general->types = Type::orderby('name', 'asc')->get();
        $this->general->professors = User::all()->filter(function($value, $key) {
            return $value->type === "professor";
        });
    }
    function index(Request $request) {
        return view($this->general->view_path, ['general' => $this->general]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->general->view_path . "/create", ['general' => $this->general]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->has('name', 'course_base_id', 'unit_id', 'classroom_id', 'credit', 'language', 'mooc', 'year', 'semester', 'enrollment_max')){
                $data = new Course;
                $data->name = $request->input('name');
                $data->course_base_id = $request->input('course_base_id');
                $data->unit_id = $request->input('unit_id');
                $data->classroom_id = $request->input('classroom_id');
                $data->credit = $request->input('credit');
                $data->language = $request->input('language');
                $data->mooc = $request->input('mooc');
                $data->year = $request->input('year');
                $data->semester = $request->input('semester');
                $data->enrollment_max = $request->input('enrollment_max');
                $data->enrollment_remain = $request->input('enrollment_max');
                $data->enroll = 1;
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->general->lists =  Course::all();
        $detail = Course::all()->where('id', '=', $id);
        return view($this->general->view_path . '/show', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->general->view_path . '/edit', ['general' => $this->general, 'id' => $id]);
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
        try {
            if ($request->has('name', 'course_base_id', 'unit_id', 'classroom_id', 'credit', 'language', 'mooc', 'year', 'semester', 'enrollment_max')){
                $data = Course::find($id);
                $data->name = $request->input('name');
                $data->course_base_id = $request->input('course_base_id');
                $data->unit_id = $request->input('unit_id');
                $data->classroom_id = $request->input('classroom_id');
                $data->topic = $request->input('topic');
                $data->credit = $request->input('credit');
                $data->language = $request->input('language');
                $data->mooc = $request->input('mooc');
                $data->year = $request->input('year');
                $data->semester = $request->input('semester');
                $data->enrollment_max = $request->input('enrollment_max');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Course::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/course');
    }
}
