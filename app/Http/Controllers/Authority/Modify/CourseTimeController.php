<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class CourseTimeController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify course time';
        $this->general->view_path .= '/course_time';

        $this->general->lists = $this->course_time->instance()->get();
        $this->general->course = $this->course->instance()->get();
        $this->general->period = $this->period->instance()->get();
        $this->general->day = $this->day->instance()->get();
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
            $inputs = $request->only(['course_id', 'day_id', 'period_id']);
            $this->course_time->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_time');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            $inputs = $request->only(['course_id', 'day_id', 'period_id']);
            $this->course_time->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_time');
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
            $this->course_time->instance()->destroy($id);
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('authority/modify/course_time');
    }
}