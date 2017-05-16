<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CourseSelection\Models\Unit;
use App\CourseSelection\Models\Course;
use App\CourseSelection\Models\Test;

class TestController extends Controller
{
    //
    function __construct () {
        parent::__construct();
    }
    function index() {
        $test = Test::findOrFail(3);
        $test->value1 = '3';
        $test->value2 = '4';
    }
}
