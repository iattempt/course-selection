<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Unit extends Controller
{
    //
    function index() {
        $data['title'] = "Modify unit";
        return view('authority/modify/unit', $data);
    }
}
