<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Student\SelectionController;

class DropController extends SelectionController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Drop";
    }
    function index() {
        $this->general->lists = DB::table('his_take_courses')->where(['student_id' => Auth::user()->id, 'state' => '預選中'])->get();
        
        return view('student/selection/drop', ['general' => $this->general]);
    }
}
