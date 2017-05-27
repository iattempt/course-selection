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
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Threshold2::all();
        return $this;
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
}
