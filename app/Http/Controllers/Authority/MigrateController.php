<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorityController;
use Repository\MigrateRepository;

class MigrateController extends AuthorityController
{
    //
    function index(Request $request)
    {
        $pre = new MigrateRepository();
        $pre->instance()->changeState();
        return back()->withInput();
    }
}
