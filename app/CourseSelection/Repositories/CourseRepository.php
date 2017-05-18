<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Course;
use Model\CourseType;
use Model\CourseTime;
use Model\CourseProfessor;

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
