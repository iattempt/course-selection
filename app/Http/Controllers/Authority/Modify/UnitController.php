<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;

class UnitController extends ModifyController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Modify unit";
    }
    function index() {
        return view('authority/modify/unit', ['general' => $this->general]);
    }
    function create() {
    
    }
    function store() {
    
    }
    function show($id) {
    
    }
    function edit($id) {
    
    }
    function update($id) {

    }
    function destory($id) {
    
    }
}
