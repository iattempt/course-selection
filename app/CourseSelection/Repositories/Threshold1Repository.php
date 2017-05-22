<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Threshold1;

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
}
