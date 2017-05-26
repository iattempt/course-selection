<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Threshold2;
use Repository\CurriculumRepository as Curriculum;
use Model\Unit;
use Repository\UserRepository as User;

class Threshold2Repository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $result_curriculum;
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Threshold2::all();
        return $this;
    }
    function copy()
    {
        $new = new Threshold2Repository();
        $new->model = $this->model;
        $new->result_curriculum = $this->result_curriculum;
        return $new;
    }
    function store(array $inputs)
    {
        $this->store_model = Threshold2::create($inputs);
        $check_dupl_inputs = $inputs;
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();
        return $this;
    }
    function update(array $inputs, $id)
    {
        $check_dupl_inputs = $inputs;
        if (!$this->isDuplicate($check_dupl_inputs, $id))
            $this->getById($id)->update($inputs);
        return $this;
    }
    function suitUnit($unit)
    {
        if (!$this->model)  return null;

        $subjection = Unit::find($unit)->unit_base_id;
        if (($subjection !=1) || ($subjection !=2))
            $this->model = $this->model->whereIn('unit_id', [$unit, $subjection]);
        else
            $this->model = $this->model->whereIn('unit_id', [$unit]);
        return $this;
    }
    function getFinishById($id)
    {
        if (!$this->model)  return null;

        return $this;
    }
    function getNonFinishById($id)
    {
        if (!$this->model)  return null;

        return $this;
    }
    function getOwnThreshold($id)
    {
        if (!$this->model) return null;
        $force_threshold = [];

        
        //取得學生單位之選修學分
        $threshold = $this->model->whereIn('unit_id', $user[0]->student->unit_id)->whereIn('adopt_year', $user[0]->student->year)->values();

        //增加選修名稱


        //根據學生修課紀錄，增加狀態
        for ($i = 0; $i < count($threshold); $i++) {
            $isNotStudied = true;
            foreach ($curriculum as $cur)
                if ($cur->course && $cur->course->course_base_id == $force_threshold[$i]['course_base_id']) {
                    $force_threshold[$i] += ['state' => $cur->state];
                    $isNotStudied = false;
                }
            if ($isNotStudied)
                $force_threshold[$i] += ['state' => '未修'];
        }
        
        for ($i = 0; $i < count($force_threshold); $i++) {
            unset($force_threshold[$i]['course_base_id']);
        }

        $temp = $force_threshold;

        $force_threshold = [];
        $force_threshold['預選中'] = [];
        $force_threshold['修課中'] = [];
        $force_threshold['已修完'] = [];
        foreach ($temp as $value) {
            $force_threshold[$value['state']][] = $value;
        }

        return $force_threshold;
    }
    /*
     * para     user_id
     * return   ['course_id', 'course_name', 'year', 'semester', 'credit', 'type']
     */
    function suitCommon($id)
    {
        //取得學生歷史修課紀錄
        $curriculum = (new Curriculum)->instance()->suitOwn($id)->suitCommon()->get()->sortBy('state');

        $this->result_curriculum = [];
        $i = 0;
        foreach ($curriculum as $value) {
            if ($value->course) {
                $temp = [];
                $temp['course_id']   = $value->course->id;
                $temp['course_name'] = $value->course->name;
                $temp['year']        = $value->course->year;
                $temp['semester']    = $value->course->semester;
                $temp['credit']      = $value->course->credit;
                $temp['state']       = $value->state;
                $isNotSetType = true;
                foreach ($value->course->types as $ct)
                    if ($ct->unit_id == '2') {
                        $isNotSetType = false;
                        $temp['type'] = $ct->type->name;
                    }
                if ($isNotSetType)
                    $temp['type'] = null;
                $i++;
                $this->result_curriculum[$i] = $temp;
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
        foreach ($this->result_curriculum as $value) {
            if ($value['type'] == $type) {
                $temp[$j] = $value;
                unset($temp[$j]['type']);
                $j++;
            }
        }
        $this->result_curriculum = $temp;
        return $this;
    }
    function suitState($state)
    {
        $j = 0;
        $temp = [];
        foreach ($this->result_curriculum as $value) {
            if ($value['state'] == $state) {
                $temp[$j] = $value;
                unset($temp[$j]['state']);
                $j++;
            }
        }
        $this->result_curriculum = $temp;
        return $this;
    }
    function suitAllTypeAndState($state)
    {
        $this->suitState($state);
        
        $humanities = $this->copy();
        $natures = $this->copy();
        $societies = $this->copy();
        $civilizations = $this->copy();

        $humanities->suitType('通識人文');
        $societies->suitType('通識社會');
        $natures->suitType('通識自然');
        $civilizations->suitType('通識文明與經典');

        $this->result_curriculum = [];
        $this->result_curriculum['通識人文'] = $humanities->getResult();
        $this->result_curriculum['通識社會'] = $societies->getResult();
        $this->result_curriculum['通識自然'] = $natures->getResult();
        $this->result_curriculum['通識文明與經典'] = $civilizations->getResult();

        return $this;
    }
    function suitAll($id)
    {
        $this->suitCommon($id);

        $pre_select = $this->copy();
        $current = $this->copy();
        $passed = $this->copy();

        $pre_select->suitAllTypeAndState('預選中');
        $current->suitAllTypeAndState('修課中');
        $passed->suitAllTypeAndState('已通過');

        $this->result_curriculum = [];
        $this->result_curriculum['預選中'] = $pre_select->getResult();
        $this->result_curriculum['修課中'] = $current->getResult();
        $this->result_curriculum['已通過'] = $passed->getResult();
        
        return $this;
    }
    function getResult()
    {
        return $this->result_curriculum;
    }
}
