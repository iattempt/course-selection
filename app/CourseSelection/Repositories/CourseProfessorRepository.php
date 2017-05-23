<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\CourseProfessor;

class CourseProfessorRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : CourseProfessor::all();
        return $this;
    }
    function store(array $inputs)
    {
        $this->store_model = CourseProfessor::create($inputs);
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
    function suitCourse($inputs)
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
