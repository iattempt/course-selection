<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Unit;

class UnitRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct()
    {
        $this->model = $this->model === null ? null : Unit::all();
    }

    function suitRegister()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereNotIn('name', ['其餘', '全部']);
        return $this;
    }
}
