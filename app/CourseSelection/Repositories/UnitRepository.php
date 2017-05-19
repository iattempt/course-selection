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

    function suitRegister()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereNotIn('name', ['其餘', '全部']);
        return $this;
    }
    function store(array $inputs)
    {
        $this->store_model = Unit::create($inputs);
        $check_dupl_inputs = $inputs;
        if ($this->isDuplicate($check_dupl_inputs))
            $this->store_model->delete();
        return $this;
    }
    function update(array $inputs, $id)
    {
        $check_dupl_inputs = $inputs;
        if (!$this->isDuplicate($check_dupl_inputs))
            $this->getById($id)->update($inputs);
        return $this;
    }
}
