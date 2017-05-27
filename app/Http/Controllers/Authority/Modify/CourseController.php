<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify course';
        $this->general->view_path .= '/course';
        $this->general->lists =  $this->course->instance()->suitCurrentSemester()->get();
        $this->general->units =  $this->unit->instance()->suitRegister()->get();
        $this->general->course_bases = $this->course_base->instance()->get();
        $this->general->classrooms = $this->classroom->instance()->get();
        $this->general->course_times = $this->course_time->instance()->get();
        $this->general->days = $this->day->instance()->get();
        $this->general->periods = $this->period->instance()->get();
        $this->general->types = $this->type->instance()->get();
        $this->general->professors = $this->professor->instance()->get();
    }
    function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        return view($this->general->view_path, ['general' => $this->general]);
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
            $inputs = $request->only(['name', 'course_base_id', 'unit_id', 'classroom_id', 'language', 'year', 'semester', 'enrollment_max']);
            $this->course->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course');
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
            $inputs = $request->only(['name', 'course_base_id', 'unit_id', 'classroom_id', 'language', 'year', 'semester', 'enrollment_max']);
            $this->course->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
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
            $this->course->instance()->destroy($id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course');
    }
}
