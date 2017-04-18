<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Selection\User;

class AuthorityController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "authority";
        $this->general->title = "authority";
    }
    function index(Request $request) {
        $this->general->info = User::find(Auth::user()->id);
        return view('authority', ['general' => $this->general]);
    }
}
