<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class Threshold2Controller extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify threshold2';
        $this->general->view_path .= '/threshold2';
    }
    function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        $this->general->lists =  $this->threshold2->instance()->get();
        $this->general->units =  $this->unit->instance()->suitRegister()->get();
        $this->general->types = $this->type->instance()->suitElective()->get();
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
            $inputs = $request->only('unit_id', 'type_id', 'credit', 'adopt_year');
            $this->threshold2->instance()->store($inputs);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold2');
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
            $inputs = $request->only('unit_id', 'type_id', 'credit', 'adopt_year');
            $this->threshold2->instance()->update($inputs, $id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold2');
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
            $this->threshold2->instance()->destroy($id);
        }
        catch (\Exception $e){
            dd($e);
        }
        return redirect('authority/modify/threshold2');
    }
}
