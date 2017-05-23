<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Unit;

class UnitRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Unit::all();
        return $this;
    }
    function getIdByName($name)
    {
        if (!$this->model)
            return null;
        return $this->model->whereIn('name', $name)[0]->id;
    }
    function suitRegister()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereNotIn('name', ['其餘', '全部']);
        return $this;
    }
    function suitCourseType()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereNotIn('name', ['全部']);
        $this->model = $this->model->whereNotIn('unit_base_id', ['2']);
        return $this;
    }
    function store(array $inputs)
    {
        $this->store_model = Unit::create($inputs);
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
}
