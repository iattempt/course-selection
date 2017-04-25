<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorityController;

class ModifyController extends AuthorityController
{
    //
    public function __construct() {
        parent::__construct();
        $this->general->view_path .= "/modify";
    }
    function index(Request $request) {
    }
}
