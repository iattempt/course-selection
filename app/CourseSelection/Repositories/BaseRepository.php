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
    protected $store_model = null;
    protected $update_model = null;

    /**
     * Create a new model and return the instance.
     *
     * @param array $inputs
     *
     * @return Model instance
     */
    public function store(array $inputs)
    {
        //$this->store_model = CourseType::create($inputs);
        //$check_dupl_input = $inputs;
        //if ($this->isDuplicate($check_dupl_input))
        //    $this->store_model->delete();
        //return $this;
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
        //須事先確認沒有重複
        //以省下紀錄舊有資訊的工作
        //$check_dupl_input = $inputs;
        //if (!$this->isDuplicate($check_dupl_input))
        //    $this->getById($id)->update($inputs);
        //return $this;
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
    public function get()
    {
        if (!$this->model)
            return null;

        return $this->model;
    }

    /**
     * lazy
     * */
    public function instance()
    {
        //$this->model = Model::all();

        return $this;
    }

    public function isDuplicate(array $inputs,int $id)
    {
        $cnt = $this->model->except($id)->filter(function ($value) use ($inputs) {
            $isDupl = true;
            foreach ($inputs as $key => $item){
                if ($value->$key != $item) {
                    $isDupl = false;
                    break;
                }
            }
            if ($isDupl)
                return true;
        })->count();

        return $cnt > 0;
    }
}
