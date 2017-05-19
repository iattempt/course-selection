<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use Model\Classroom;
use App\User;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify classroom';
        $this->general->view_path .= '/classroom';
        $this->general->lists =  Classroom::all();
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
            $inputs = $request->only(['name']);
            $this->classroom->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/classroom');
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
            $inputs = $request->only(['name']);
            $this->classroom->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/classroom');
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
            $this->classroom->instance()->destroy($id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/classroom');
    }
}
