<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Repository\CurriculumRepository as Curriculum;
use App\User as User;
use Model\Unit as Unit;

class ThresholdRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $user_id;
    protected $result;
    protected $curriculum;
    protected $credit;
    function __construct($id){
        $this->user_id = $id;
        $this->curriculum = (new Curriculum)->instance()->suitOwn($id)->get()->sortBy('state');
    }
    /*
     * para     user_id
     * return   ['course_id', 'course_name', 'year', 'semester', 'credit', 'type']
     */
    function suitCurriculum()
    {
        $this->result = [];
        $i = 0;
        $user_unit_id = User::find($this->user_id)->student->unit_id;
        $user_unit_ids = [];
        $user_unit_ids[0] = $user_unit_id;
        $user_unit_ids[1] = Unit::find($user_unit_id)->unit_base_id;

        foreach ($this->curriculum as $value) {
            if ($value->course) {
                $temp = [];
                $temp['course_id']   = $value->course->id;
                $temp['course_name'] = $value->course->name;
                $temp['year']        = $value->course->year;
                $temp['semester']    = $value->course->semester;
                $temp['credit']      = $value->course->credit;
                $temp['state']       = $value->state;

                //判定型別
                $isNotSetType = true;
                foreach ($value->course->types as $ct)
                    foreach ($user_unit_ids as $unit_id)
                        if ($ct->unit_id == $unit_id) {
                            $isNotSetType = false;
                            $temp['type'] = $ct->type->name;
                            //預設為樹枝節點的修別
                            break 2;
                        }
                if ($isNotSetType)
                    foreach ($value->course->types as $ct) 
                        if ($ct->unit_id == 2) {
                            $isNotSetType = false;
                            $temp['type'] = $ct->type->name;
                            //預設為樹枝節點的修別
                            break;
                        }
                if ($isNotSetType)
                    $temp['type'] = null;
                $i++;
                $this->result[$i] = $temp;
            }
        }

        return $this;
    }
    /*
     * para     userid
     * return   []
     */
    function suitType($type)
    {
        $j = 0;
        $temp = [];
        foreach ($this->result as $value) {
            if ($value['type'] == $type) {
                $temp[$j] = $value;
                unset($temp[$j]['type']);
                $j++;
            }
        }
        $this->result = $temp;
        return $this;
    }
    
    function suitState($state)
    {
        $j = 0;
        $temp = [];
        foreach ($this->result as $value) {
            if ($value['state'] == $state) {
                $temp[$j] = $value;
                unset($temp[$j]['state']);
                $j++;
            }
        }
        $this->result = $temp;
        return $this;
    }
    function copy()
    {
        $new = new ThresholdRepository($this->user_id);
        $new->result = $this->result;
        $new->curriculum= $this->curriculum;
        return $new;
    }
    function suitAllTypeAndState($state)
    {
        $this->suitState($state);
        
        $force = $this->copy();
        $force_elective = $this->copy();
        $common_force = $this->copy();
        $elective= $this->copy();
        $humanities = $this->copy();
        $natures = $this->copy();
        $societies = $this->copy();
        $civilizations = $this->copy();

        $force->suitType('必修');
        $force_elective->suitType('必選修');
        $common_force->suitType('共必修');
        $elective->suitType('選修');
        $humanities->suitType('通識人文');
        $societies->suitType('通識社會');
        $natures->suitType('通識自然');
        $civilizations->suitType('通識文明與經典');

        $this->result = [];
        $this->result['必修'] = $force->get();
        $this->result['必選修'] = $force_elective->get();
        $this->result['共必修'] = $common_force->get();
        $this->result['選修'] = $elective->get();
        $this->result['通識人文'] = $humanities->get();
        $this->result['通識社會'] = $societies->get();
        $this->result['通識自然'] = $natures->get();
        $this->result['通識文明與經典'] = $civilizations->get();

        return $this;
    }
    function suitAll()
    {
        $this->suitCurriculum();

        $pre_select = $this->copy();
        $current = $this->copy();
        $passed = $this->copy();

        $pre_select->suitAllTypeAndState('預選中');
        $current->suitAllTypeAndState('修課中');
        $passed->suitAllTypeAndState('已修完');

        $this->result = [];
        $this->result['預選中'] = $pre_select->get();
        $this->result['修課中'] = $current->get();
        $this->result['已修完'] = $passed->get();
        
        return $this;
    }
    function get()
    {
        return $this->result;
    }
}
