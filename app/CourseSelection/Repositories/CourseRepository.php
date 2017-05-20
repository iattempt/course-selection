<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Course;

class CourseRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : Course::all();
        return $this;
    }
    function store(array $inputs)
    {
        $inputs['enrollment_remain'] = $inputs['enrollment_max'];
        $inputs['enroll'] = $inputs['enrollment_max'] > $inputs['enrollment_remain'] ? 1 : 0;
        $this->store_model = Course::create($inputs);
        return $this;
    }
    function update(array $inputs, $id)
    {
        $inputs['enrollment_remain'] = $this->getById($id)->enrollment_remain;
        if ($inputs['enrollment_remain'] > $inputs['enrollment_max'])
            return $this;
        else if ($inputs['enrollment_max'] > $this->getById($id)->enrollment_max) {
            $inputs['enrollment_remain'] += $inputs['enrollment_max'] - $this->getById($id)->enrollment_max;
        }
        $inputs['enroll'] = $inputs['enrollment_remain']>0 ? 0 : 1;
        $this->getById($id)->update($inputs);
        return $this;
    }
    function suitCurriculum($ownCurriculum)
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->filter(function ($value, $key) use ($ownCurriculum) {
            foreach ($ownCurriculum as $o) {
                if ($value->id === $o->course_id)
                    return $value;
            }
        });
        return $this;
    }
    function subEnrollment($id)
    {
        if (!$this->model)
            return null;
        $data = $this->getById($id);
        $data->enrollment_remain--;
        $data->save();
        return $this;
    }
}
