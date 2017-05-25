<?php

namespace Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Model\Threshold1;
use Model\Unit;
use Repository\CurriculumRepository as Curriculum;
use Repository\UserRepository as User;

class Threshold1Repository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Threshold1::all();
        return $this;
    }
    function store(array $inputs)
    {
        $this->store_model = Threshold1::create($inputs);
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
    function suitYear($year)
    {
        if (!$this->model)  return null;
        
        $this->model = $this->model->whereIn('adopt_year', $year);
        return $this;
    }
    function suitGrade($grade)
    {
        if (!$this->model)  return null;
        
        $this->model = $this->model->whereIn('adopt_grade', $grade);
        return $this;
    }
    function suitSemester($semester)
    {
        if (!$this->model)  return null;
        
        $this->model = $this->model->whereIn('adopt_semester', $semester);
        return $this;
    }
    function getOwnForceThreshold($id)
    {
        if (!$this->model) return null;
        $force_threshold = [];

        //取得學生
        $user = (new User)->instance()->suitOwn($id)->get()->values();
        if (!$user || !$user[0]->student) return null;
        
        //取得學生單位之必修科目
        $threshold = $this->model->whereIn('unit_id', $user[0]->student->unit_id)->whereIn('adopt_year', $user[0]->student->year)->values();

        for ($i = 0; $i < count($threshold); $i++) {
            $force_threshold[$i] = ['course_base_id' => $threshold[$i]->course_base_id, 'course_name' => $threshold[$i]->course_base->name, 'adopt_semester' => $threshold[$i]->adopt_grade . '-' . $threshold[$i]->adopt_semester];
        }

        //取得學生歷史修課紀錄
        $curriculum = (new Curriculum)->instance()->suitOwn($id)->get();

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
        $force_threshold['未修'] = [];
        $force_threshold['預選中'] = [];
        $force_threshold['修課中'] = [];
        $force_threshold['已修完'] = [];
        foreach ($temp as $value) {
            $force_threshold[$value['state']][] = $value;
        }

        return $force_threshold;
    }
}
