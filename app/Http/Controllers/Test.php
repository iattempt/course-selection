<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Selection\Unit;
use App\Selection\Course;

class Test extends Controller
{
    //
    function __construct () {
        parent::__construct();
    }
    function index() {
        $this->general->lists = Course::all();
        $this->general->lists = $this->general->lists->filter(function ($value, $key) {
            foreach($value->professors as $p)
                return $p->user->name == "蔡清*";
        });
        foreach ($this->general->lists as $l) {
            var_dump($l->name);
            foreach($l->professors as $p) {
                var_dump($p->user->name);
            }
        }
        /*
        $unit = Unit::all();
        $unit = $unit->keyBy('subjection');
        $units = Unit::all()->sortBy('subjection');
        foreach ($unit as $us) {
            foreach ($units as $u) {
                if ($u->subjection == $us->subjection)
                    var_dump($u->name);
            }
        }
         */



    }
}
