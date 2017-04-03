<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorityController;

class RegisterController extends AuthorityController
{
    //
    function __construct() {
        parent::__construct();
        $this->general->title = "Register";
    }
    function index() {
        return view('authority/register', ['general' => $this->general]);
    }
}
