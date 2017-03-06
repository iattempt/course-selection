<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Classroom extends Controller
{
    //
    function index() {
        $data['title'] = "Modify classroom";
        return view('authority/modify/classroom', $data);
    }
}
