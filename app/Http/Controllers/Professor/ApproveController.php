<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApproveController extends Controller
{
    //
    function index() {
        $data['title'] = "Approve";
        return view('professor/approve', $data);
    }
}
