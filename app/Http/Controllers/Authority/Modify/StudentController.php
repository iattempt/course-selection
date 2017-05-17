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
        $this->general->lists =  $this->user->student()->get();
        $this->general->units = $this->unit->suitRegister()->get();
        $this->general->info = User::find(auth::user()->id);
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
            if ($request->has('name', 'email', 'year', 'state', 'unit_id', 'password')){
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->type = 'student';
                $user->save();
                $student = new Student;
                $student->id = $user->id;
                $student->year = $request->input('year');
                $student->state = $request->input('state');
                $student->unit_id = $request->input('unit_id');
                $student->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            $this->general->message = "failed";
            $this->general->message_type = "danger";
        }
        return redirect('authority/modify/student');
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
            if ($request->has('name', 'email', 'year', 'state', 'unit_id')){
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                if ($request->has('password') !== null)
                    $user->password = bcrypt($request->input('password'));
                $user->save();
                $student = Student::find($id);
                $student->id = $user->id;
                $student->year = $request->input('year');
                $student->state = $request->input('state');
                $student->unit_id = $request->input('unit_id');
                $student->save();
                $this->general->message = "created";
                $this->general->message_type = "success";
            }
        }
        catch (\Exception $e){
            dd($e);
            $this->general->message = "failed";
            $this->general->message_type = "danger";
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
            Student::destroy($id);
            User::destroy($id);
            $this->general->message = 'successed';
            $this->general->message_type = 'success';
        }
        catch (\Exception $e){
            $this->general->message = 'failed';
            $this->general->message_type = 'danger';
        }
        return redirect('authority/modify/student');
    }
}
