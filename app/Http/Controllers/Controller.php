<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\App;
use App\User;
use Repository\DayRepository as Day;
use Repository\PeriodRepository as Period;
use Repository\CurriculumRepository as Curriculum;
use Repository\UnitRepository as Unit;
use Repository\TypeRepository as Type;
use Repository\UserRepository;

class Controller extends BaseController
{
    protected $day;
    protected $period;
    protected $curriculum;
    protected $unit;
    protected $type;
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

        $this->day = Day::instance();
        $this->period = Period::instance();
        $this->curriculum = Curriculum::instance();
        $this->unit = new Unit();
        $this->user = new UserRepository();
        $this->type = Type::instance();
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
