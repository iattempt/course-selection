<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Classroom;

class ClassroomRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Classroom::all();
        return $this;
    }
}
