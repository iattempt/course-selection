<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorityController;

class CourseSearchController extends AuthorityController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'authority';
    }
    function index() {
        return view('course_search', ['general' => $this->general]);
    }
}
