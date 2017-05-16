<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = 'Modify admin';
        $this->general->view_path .= '/admin';
    }
    function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        $this->general->lists =  User::all()->whereIn('type', ['authority'])->whereNotIn('name', ['admin']);
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
                $data = new User;
                $data->name = $request->input('name');
                $data->email = $request->input('email');
                $data->password = bcrypt($request->input('password'));
                $data->type = $request->input('type');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->general->lists =  User::all();
        $detail = User::all()->where('id', '=', $id);
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
            if ($request->has('name', 'email', 'type')){
                $data = User::find($id);
                $data->name = $request->input('name');
                $data->email = $request->input('email');
                if ($request->has('password'))
                    $data->password = bcrypt($request->input('password'));
                $data->type = $request->input('type');
                $data->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            dd($e);
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/user');
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
            User::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/user');
    }
}
