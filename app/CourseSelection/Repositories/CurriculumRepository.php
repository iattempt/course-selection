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
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null ? null : Curriculum::all();

        return $this;
    }

    public function suitCurrentSelection()
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('state', '修課中');

        return $this;
    }

    public function suitPreSelection()
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('state', '預選中');

        return $this;
    }

    public function suitOwn($id)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('student_id', $id);

        return $this;
    }

    public function suitPre()
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('state', '預選中');

        return $this;
    }

    public function suitCur()
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('state', '修課中');

        return $this;
    }

    public function getCourseOfOwn($id, $course_id)
    {
        $this->suitOwn($id);
        foreach ($this->model as $value) {
            if ($value->course_id == $course_id)
                return $value;
        }

        return null;
    }

    public function suitCommon()
    {
        if (!$this->model)  return null;
        $this->model = $this->model->filter(function ($value, $key) {
            if ($value->course && $value->course->isCommon())
                return $value;
        });

        return $this;
    }
}
