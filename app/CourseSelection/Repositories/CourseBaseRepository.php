<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\CourseBase;

class CourseBaseRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : CourseBase::all();
        return $this;
    }
}
