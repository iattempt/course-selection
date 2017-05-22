<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Threshold1;
use Model\Unit;
use Repository\CurriculumRepository as Curriculum;

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
    function getByUnit($unit)
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
    function suitOwn($id)
    {
        if (!$this->model)  return null;

        $curriculum = Curriculum::all()->whereIn('student_id', $id);
        foreach($curriculum as $cur) {
            $this->model = $this->model->filter(function ($value, $key) use($curriculum){
                if ($value->course_id == $curriculum->course_id)
                    return $value;
            });
        }
        return $this;
    }
    function getNonFinishById($id)
    {
        if (!$this->model)  return null;

        $curriculum = Curriculum::all()->whereIn('student_id', $id);
        return $this;
    }
}
