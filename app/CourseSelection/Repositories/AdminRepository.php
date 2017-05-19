<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminRepository extends BaseRepository
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
        $this->model = $this->model === null ? null : User::all()->whereIn('type', ['authority'])->whereNotIn('name', ['admin']);
        return $this; 
    }
    function store(array $inputs)
    {
        //需要再修改，目前僅能依靠資料庫設定email為唯一。
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'authority';
        $this->store_model = User::create($inputs);
        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if ($this->isDuplicate($check_dupl_inputs))
            $this->store_model->delete();
        return $this;
    }
    function update(array $inputs, $id)
    {
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'authority';
        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if (!$this->isDuplicate($check_dupl_inputs))
            $this->getById($id)->update($inputs);
        return $this;
    }
}
