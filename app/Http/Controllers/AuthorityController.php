<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorityController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = 'Authority';
        $this->data['auth'] = "authority";
    }
    function index() {
        return view('course_search', $this->data);
    }
}
