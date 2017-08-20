<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AuthorityController extends Controller
{
    public function __construct () {
        parent::__construct();
        $this->general->identity = "authority";
        $this->general->title = "authority";
        $this->general->view_path .= "/authority";
        $this->rebuildTemporaryDirection();
    }

    public function index(Request $request) {
        $this->general->info = User::find(Auth::user()->id);
        
        return view('authority/index', ['general' => $this->general]);
    }

    public function rebuildTemporaryDirection()
    {
        $temporary_file_path = 'temporary/';
        $process = new Process('rm -r '.$temporary_file_path);
        $process->run();

        $process = new Process('mkdir '.$temporary_file_path);
        $process->run();
    }
}
