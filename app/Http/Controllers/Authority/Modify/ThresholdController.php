<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\Selection\Threshold;
use App\Selection\Unit;
use App\Selection\Type;
use App\Selection\User;
use App\Selection\CourseBase;
use Illuminate\Support\Facades\Auth;

class thresholdController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify threshold';
        $this->general->view_path .= '/threshold';
        $this->general->lists =  Threshold::all();
        $this->general->units =  Unit::all();
        $this->general->course_bases =  CourseBase::all();
        $this->general->types = Type::all();
    }
    function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        return view($this->general->view_path, ['general' => $this->general]);
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
        try {
            if ($request->has('unit_id', 'type_id', 'course_base_id', 'adopt_year', 'default_grade', 'default_semester')){
                $data = new threshold;
                $data->unit_id = $request->input('unit_id');
                $data->type_id = $request->input('type_id');
                $data->course_base_id = $request->input('course_base_id');
                $data->adopt_year = $request->input('adopt_year');
                $data->default_grade = $request->input('default_grade');
                $data->default_semester = $request->input('default_semester');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/threshold');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->general->lists =  threshold::all();
        $detail = threshold::all()->where('id', '=', $id);
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
            if ($request->has('unit_id', 'type_id', 'course_base_id', 'adopt_year', 'default_grade', 'default_semester')){
                $data = threshold::find($id);
                $data->unit_id = $request->input('unit_id');
                $data->type_id = $request->input('type_id');
                $data->course_base_id = $request->input('course_base_id');
                $data->adopt_year = $request->input('adopt_year');
                $data->default_grade = $request->input('default_grade');
                $data->default_semester = $request->input('default_semester');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/threshold');
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
            threshold::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/threshold');
    }
}
