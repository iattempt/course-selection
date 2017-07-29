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
        $this->model = $this->model->whereIn('type_base_id', [2]);
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
    function store(array $inputs)
    {
        $this->store_model = Type::create($inputs);
        $check_dupl_inputs = $inputs;
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();
        return $this;
    }
    function update(array $inputs, $id)
    {
        $check_dupl_inputs = $inputs;
        if (!$this->isDuplicate($check_dupl_inputs, $id))
            $this->getById($id)->update($inputs);
        return $this;
    }
}
