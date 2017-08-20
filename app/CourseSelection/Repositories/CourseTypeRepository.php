<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\CourseType;

class CourseTypeRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    public function __construct(){}

    public function instance()
    {
        $this->model = $this->model === null ? null : CourseType::all();

        return $this;
    }

    public function store(array $inputs)
    {
        $this->store_model = CourseType::create($inputs);
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

    public function suitUnit($id)
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('unit_id', $id);

        return $this;
    }

    public function suitCourse($inputs)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use($inputs) {
            foreach ($inputs as $input) {
                if ($value->course_id == $input->id)
                    return $value;
            }
        });

        return $this;
    }
}
