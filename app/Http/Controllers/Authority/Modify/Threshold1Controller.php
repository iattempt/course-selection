<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class Threshold1Controller extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify threshold1';
        $this->general->view_path .= '/threshold1';
    }
    function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        $this->general->lists =  $this->threshold1->instance()->get();
        $this->general->units =  $this->unit->instance()->suitRegister()->get();
        $this->general->course_bases =  $this->course_base->instance()->get();
        $this->general->types = $this->type->instance()->suitForce()->get();
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
            $inputs = $request->only('unit_id', 'type_id', 'course_base_id', 'adopt_year', 'default_grade', 'default_semester');
            $this->threshold1->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold1');
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
            $inputs = $request->only('unit_id', 'type_id', 'course_base_id', 'adopt_year', 'default_grade', 'default_semester');
            $this->threshold1->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold1');
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
            $this->threshold1->instance()->destroy($id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold1');
    }
}
