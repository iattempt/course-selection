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
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null
            ? null
            : User::all()
            ->whereIn('type', ['authority'])
            ->whereNotIn('name', ['admin']);

        return $this; 
    }

    public function store(array $inputs)
    {
        //需要再修改，目前僅能依靠資料庫設定email為唯一。
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'authority';
        $this->store_model = User::create($inputs);
        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();

        return $this;
    }

    public function update(array $inputs, $id)
    {
        if ($inputs['password'])
            $inputs['password'] = bcrypt($inputs['password']);
        else
            $inputs['password'] = $this->getById($id)->password;
        $inputs['type'] = 'authority';
        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if (!$this->isDuplicate($check_dupl_inputs, $id))
            $this->getById($id)->update($inputs);

        return $this;
    }
}
