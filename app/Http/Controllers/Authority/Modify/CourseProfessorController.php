<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class CourseprofessorController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify course professor';
        $this->general->view_path .= '/course_professor';

        $this->general->lists = $this->course_professor->instance()->get();
        $this->general->course = $this->course->instance()->get();
        $this->general->professor = $this->professor->instance()->get();
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
            $inputs = $request->only(['course_id', 'user_id']);
            $this->course_professor->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_professor');
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
            $inputs = $request->only(['course_id', 'user_id']);
            $this->course_professor->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/course_professor');
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
            $this->course_professor->instance()->destroy($id);
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect('authority/modify/course_professor');
    }
}
