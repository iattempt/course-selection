<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;

class ClassroomController extends ModifyController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = "Modify classroom";
    }
    function index() {
        return view('authority/modify/classroom', ['general' => $this->general]);
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
