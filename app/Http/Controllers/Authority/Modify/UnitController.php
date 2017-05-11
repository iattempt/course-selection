<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\Selection\Unit;

class UnitController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify unit';
        $this->general->view_path .= '/unit';
        $this->general->lists = Unit::all();
    }
    function index(Request $request) {
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
                $data = new Unit;
                $data->name = $request->input('name');
                $data->unit_base_id = $request->input('unit_base_id');
                $data->save();
            }
        }
        catch (\Exception $e){
            return var_dump($e);
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->general->lists =  Unit::all();
        $detail = Unit::all()->where('id', '=', $id);
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
                $data = Unit::find($id);
                $data->name = $request->input('name');
                $data->unit_base_id = $request->input('unit_base_id');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/unit');
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
            Unit::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/unit');
    }
}
