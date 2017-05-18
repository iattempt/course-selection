<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     * set as non-null is use model,
     * otherwise set as null always return null.
     */
    protected $model = 1;

    /**
     * Create a new model and return the instance.
     *
     * @param array $inputs
     *
     * @return Model instance
     */
    public function store(array $inputs)
    {
        return $this->model->create($inputs);
    }

    /**
     * FindOrFail Model and return the instance.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the model in the database.
     *
     * @param $id
     * @param array $inputs
     */
    public function update(array $inputs, $id)
    {
        $this->getById($id)->update($inputs);
        return $this;
    }

    /**
     * Delete the model from the database.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
        return $this;
    }

    /**
     * Paginate the given query.
     *
     * @param The number of models to return for pagination $n integer
     *
     * @return mixed
     */
    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    /**
     * return static
     * */
    function get()
    {
        if (!$this->model)
            return null;
        return $this->model;
    }

    /**
     * lazy
     * */
    function instance()
    {
        //$this->model = Model::all();
        return $this;
    }

    function isDuplicate($new_model)
    {
        //$cnt = $this->model->filter(function (int $value) use ($new_model) {
        //    return (($value->course_id == $new_model->course_id)
        //            &&($value->day_id == $new_model->day_id)
        //           &&($value->period_id == $new_model->period_id));
        //})->count();
        //return $cnt>0;
        return $true;
    }
}
