<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function __construct () {
        parent::__construct();
    }
    function index() {
        $this->threshold1 = $this->threshold1->instance()->getByUnit(9);
        $this->general->units = $this->unit->instance()->get();
        $this->general->types = $this->type->instance()->get();
        $this->general->course_bases = $this->course_base->instance()->get();
        $this->general->lists = $this->threshold1->get();
        return view('authority/modify/threshold1', ['general' => $this->general]);
    }
}
