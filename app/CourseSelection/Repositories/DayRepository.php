<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Day;

class DayRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}

    function instance()
    {
        $this->model = $this->model === null ? null : Day::all()->sordBy('id');
        return $this;
    }
}
