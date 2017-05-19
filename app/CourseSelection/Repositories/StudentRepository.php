<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Model\Student;

class StudentRepository extends BaseRepository
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
        $this->model = $this->model === null ? null : User::all()->whereIn('type', ['student']);
        return $this; 
    }
    function store(array $inputs)
    {
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'student';

        $user_inputs = $inputs;
        unset($user_inputs['year']);
        unset($user_inputs['state']);
        unset($user_inputs['unit_id']);
        $this->store_model = User::create($user_inputs);

        $inputs['id'] = $this->store_model->id;
        $check_dupl_inputs = $user_inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        if ($this->isDuplicate($check_dupl_inputs))
            $this->store_model->delete();
        else {
            $student_inputs = $inputs;
            unset($student_inputs['name']);
            unset($student_inputs['email']);
            unset($student_inputs['password']);
            unset($student_inputs['type']);
            $this->store_model = Student::create($student_inputs);
        }

        return $this;
    }
    function update(array $inputs, $id)
    {
        $inputs['password'] = bcrypt($inputs['password']);
        $inputs['type'] = 'student';

        $check_dupl_inputs = $inputs;
        unset($check_dupl_inputs['name']);
        unset($check_dupl_inputs['password']);
        unset($check_dupl_inputs['type']);
        unset($check_dupl_inputs['year']);
        unset($check_dupl_inputs['state']);
        unset($check_dupl_inputs['unit_id']);
        if (!$this->isDuplicate($check_dupl_inputs)) {
            try {
                Student::find($id)->update($inputs);
                $this->getById($id)->update($inputs);
            } catch (\Exception $e) {
                dd($e);
            }
        }
        return $this;
    }
    function destroy($id)
    {
        Student::find($id)->delete();
        return parent::destroy($id);
    }
}
