<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\CourseTime;

class CourseTimeRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : CourseTime::all();
        return $this;
    }
    public function store(array $inputs)
    {
        $data = new CourseTime();
        $data->create($inputs);
        if ($this->isDuplicate($data))
            $data->delete();
        return $this;
    }
    function isDuplicate($new_model)
    {
        $cnt = $this->model->filter(function ($value) use ($new_model) {
            return (($value->course_id == $new_model->course_id)
                    &&($value->day_id == $new_model->day_id)
                    &&($value->period_id == $new_model->period_id));
        })->count();
        return $cnt > 0;
    }
}
