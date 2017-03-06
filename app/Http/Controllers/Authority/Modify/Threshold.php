<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Threshold extends Controller
{
    //
    function index() {
        $data['title'] = "Modify threshold";
        return view('authority/modify/threshold', $data);
    }
}
