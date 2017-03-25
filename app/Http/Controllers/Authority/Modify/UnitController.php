<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;

class UnitController extends ModifyController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Modify unit";
    }
    function index() {
        return view('authority/modify/unit', $this->data);
    }
}
