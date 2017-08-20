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
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null ? null : Threshold2::all();

        return $this;
    }

    public function store(array $inputs)
    {
        $this->store_model = Threshold2::create($inputs);
        $check_dupl_inputs = $inputs;
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();

        return $this;
    }

    public function update(array $inputs, $id)
    {
        $check_dupl_inputs = $inputs;
        if (!$this->isDuplicate($check_dupl_inputs, $id))
            $this->getById($id)->update($inputs);

        return $this;
    }

    public function suitUnit($unit)
    {
        if (!$this->model)
            return null;

        $subjection = Unit::find($unit)->unit_base_id;
        if (($subjection !=1) || ($subjection !=2))
            $this->model = $this->model->whereIn('unit_id', [$unit, $subjection]);
        else
            $this->model = $this->model->whereIn('unit_id', [$unit]);

        return $this;
    }

    public function getFinishById($id)
    {
        if (!$this->model)
            return null;

        return $this;
    }

    public function getNonFinishById($id)
    {
        if (!$this->model)
            return null;

        return $this;
    }
}
