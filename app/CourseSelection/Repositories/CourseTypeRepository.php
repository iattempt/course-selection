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
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : CourseType::all();
        return $this;
    }
    public function store(array $inputs)
    {
        $data = new CourseType();
        $data->create($inputs);
        if ($this->isDuplicate($data))
            $data->delete();
        return $this;
    }
    function isDuplicate($new_model)
    {
        $cnt = $this->model->filter(function ($value) use ($new_model) {
            return (($value->course_id == $new_model->course_id)
                    &&($value->type_id == $new_model->type_id)
                    &&($value->unit_id == $new_model->unit_id));
        })->count();
        return $cnt > 0;
    }
}
