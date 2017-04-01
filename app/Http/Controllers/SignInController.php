<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Selection\Account;

class SignInController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Sign in";
    }
    function index() {
        return view('sign_in', ['general' => $this->general]);
    }
    function verify() {
        $accounts = Account::all();
        for ($i = 0; $i<count($accounts); $i++)
        {
            if ($accounts[$i]->account == $_POST["account"] && $accounts[$i]->password ==$_POST["password"]){
                return redirect($accounts[$i]->type);
            }
        }
        $this->general->errors[] = "帳號密碼輸入有誤，請重試";
        return view('sign_in', ['general' => $this->general, 'errors' => $this->general->errors]);
    }
}
