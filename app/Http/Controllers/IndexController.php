<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (Auth::check()){
            return redirect(Auth::user()->getType());
        }
        return redirect('login');
    }
}
