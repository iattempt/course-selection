<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Model\Professor;

class ProfessorRepository extends BaseRepository
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
            : User::all()->whereIn('type', ['professor']);

        return $this; 
    }

    public function store(array $inputs)
    {
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'professor';

        $user_inputs = $inputs;
        unset($user_inputs['title']);
        unset($user_inputs['skills']);
        unset($user_inputs['unit_id']);
        $this->store_model = User::create($user_inputs);

        $inputs['id'] = $this->store_model->id;
        $check_dupl_inputs = $user_inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();
        else {
            $professor_inputs = $inputs;
            unset($professor_inputs['name']);
            unset($professor_inputs['email']);
            unset($professor_inputs['password']);
            unset($professor_inputs['type']);
            $this->store_model = Professor::create($professor_inputs);
        }

        return $this;
    }

    public function update(array $inputs, $id)
    {
        if ($inputs['password'])
            $inputs['password'] = bcrypt($inputs['password']);
        else
            $inputs['password'] = $this->getById($id)->password;
        $inputs['type'] = 'professor';

        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        unset($check_dupl_inputs['unit_id']);
        unset($check_dupl_inputs['title']);
        unset($check_dupl_inputs['skills']);
        if (!$this->isDuplicate($check_dupl_inputs, $id)) {
            try {
                Professor::find($id)->update($inputs);
                $this->getById($id)->update($inputs);
            } catch (\Exception $e) {
                dd($e);
            }
        }

        return $this;
    }

    public function destroy($id)
    {
        Professor::find($id)->delete();

        return parent::destroy($id);
    }
}
