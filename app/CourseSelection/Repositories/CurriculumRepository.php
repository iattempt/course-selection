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
        return $this->model->where('student_id', $id);
    }
}
