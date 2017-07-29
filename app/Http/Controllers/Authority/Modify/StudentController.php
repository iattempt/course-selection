<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use Model\Student;
use App\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify user';
        $this->general->view_path .= '/student';
    }
    function index(Request $request) {
        $this->general->info = User::find(auth::user()->id);
        $this->general->lists =  $this->student->instance()->get();
        $this->general->units = $this->unit->instance()->suitRegister()->get();
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
            $inputs = $request->only(['name', 'email', 'password', 'year', 'state', 'unit_id']);
            $this->student->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/student');
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
            $inputs = $request->only(['name', 'email', 'password', 'year', 'state', 'unit_id']);
            $this->student->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/student');
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
            $this->student->instance()->destroy($id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/student');
    }
}
