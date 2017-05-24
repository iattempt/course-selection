<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Type;

class TypeRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct()
    {}
    function instance()
    {
        $this->model = $this->model === null ? null : Type::all();
        return $this;
    }
    function suitForce()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('name', ['必修', '必選修']);
        return $this;
    }
    function suitElective()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('subjection', ['通識']);
        $this->model = $this->model->merge(Type::all()->whereIn('name', ['選修']));
        return $this;
    }
    function suitFilter()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereNotIn('name', ['學校', '外系不可加選']);
        return $this;
    }
}
