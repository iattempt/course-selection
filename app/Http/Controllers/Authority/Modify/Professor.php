<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Professor extends Controller
{
    //
    function index() {
        $data['title'] = "Modify professor";
        return view('authority/modify/professor', $data);
    }
}
