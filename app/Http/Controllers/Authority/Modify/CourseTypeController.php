<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class CourseTypeController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify course type';
        $this->general->view_path .= '/course_type';

        $this->general->lists = $this->course_type->instance()->get();
        $this->general->course = $this->course->instance()->get();
        $this->general->type = $this->type->instance()->get();
        $this->general->unit = $this->unit->instance()->get();
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
            $inputs = $request->only(['course_id', 'unit_id', 'type_id']);
            $this->course_type->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_type');
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
            $inputs = $request->only(['course_id', 'unit_id', 'type_id']);
            $this->course_type->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_type');
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
            $this->course_type->instance()->destroy($id);
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('authority/modify/course_type');
    }
}
