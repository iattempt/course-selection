<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class RecommendationController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Enroll recommendation";
    }
    function index() {
        return view('student/selection/enroll/recommendation', ['general' => $this->general]);
    }
}
