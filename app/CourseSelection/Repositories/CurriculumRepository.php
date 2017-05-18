<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Curriculum;

class CurriculumRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : Curriculum::all();
        return $this;
    }

    function suitOwn($id)
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('student_id', $id);
        return $this;
    }
    function getCourseOfOwn($id, $course_id)
    {
        $this->suitOwn(id);
        foreach ($this->model as $value) {
            if ($value->course_id == $course_id)
                return value;
        }
        return null;
    }
}
