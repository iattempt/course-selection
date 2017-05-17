<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\App;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $general;
    public function __construct () {
        $this->general = new General();
        $this->general->identity = '';
        $this->general->my_unit;
        $this->general->view_path = '/';
        $this->general->message = '';
        $this->general->message_type = '';
        $this->general->ip = $this->getIP();

        $this->general->school = new School();
        $this->general->school->name = config('app.name');
        $this->general->school->website = config('app.website');
        $this->general->school->calender = config('app.calender');
    }
    public function getUsers($type)
    {
        $u = User::all()->filter(function ($value, $key) use($type){
            if($value->type == $type)
                return $value;
        });
        return $u;
    }
    public function getIP()
    {
        if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                $ip = $_SERVER["HTTP_CLIENT_IP"];
        }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else{
                $ip = $_SERVER["REMOTE_ADDR"];
        }
             
        return $ip;
    }
}

Class General
{
    public $title;
    public $identity;
    public $my_unit;
    public $school; //School class
    public $errors;

    public function __construct () {
    }
}

class School
{
    public $name;
    public $calender;
    public $website;
    
    public function __construct () {
    }
}
