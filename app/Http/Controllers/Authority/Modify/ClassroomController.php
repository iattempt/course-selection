<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\Selection\Classroom;
use App\Selection\User;
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
            if ($request->has('name')){
                $data = new Classroom;
                $data->name = $request->input('name');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/classroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->general->lists =  Classroom::all();
        $detail = Classroom::all()->where('id', '=', $id);
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
            if ($request->has('name')){
                $data = Classroom::find($id);
                $data->name = $request->input('name');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
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
            Classroom::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/classroom');
    }
}
