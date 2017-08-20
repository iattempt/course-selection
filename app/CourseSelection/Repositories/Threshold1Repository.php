<?php

namespace Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Model\Threshold1;
use Model\Unit;
use Repository\CurriculumRepository as Curriculum;
use Repository\UserRepository as User;

class Threshold1Repository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $result;
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null ? null : Threshold1::all();

        return $this;
    }

    public function store(array $inputs)
    {
        $this->store_model = Threshold1::create($inputs);
        $check_dupl_inputs = $inputs;
        if ($this->isDuplicate($check_dupl_inputs, $this->store_model->id))
            $this->store_model->delete();

        return $this;
    }

    public function update(array $inputs, $id)
    {
        $check_dupl_inputs = $inputs;
        if (!$this->isDuplicate($check_dupl_inputs, $id))
            $this->getById($id)->update($inputs);

        return $this;
    }

    public function suitUnit($unit_id)
    {
        if (!$this->model)
            return null;

        $subjection = Unit::find($unit_id)->unit_base_id;
        if (($subjection !=1) || ($subjection !=2))
            $this->model = $this->model->whereIn('unit_id', [$unit_id, $subjection]);
        else
            $this->model = $this->model->whereIn('unit_id', [$unit_id]);

        return $this;
    }

    public function suitYear($year)
    {
        if (!$this->model)
            return null;
        
        $this->model = $this->model->whereIn('adopt_year', $year);

        return $this;
    }

    public function suitGrade($grade)
    {
        if (!$this->model)
            return null;
        
        $this->model = $this->model->whereIn('adopt_grade', $grade);

        return $this;
    }

    public function suitSemester($semester)
    {
        if (!$this->model)
            return null;
        
        $this->model = $this->model->whereIn('adopt_semester', $semester);

        return $this;
    }

    public function suitNonSelect($curriculum)
    {
        if (!$this->model)
            return null;
        
        $this->model = $this->model->filter(function ($value, $key) use($curriculum){
            foreach ($curriculum as $cur)
                if ($cur->course && $cur->course->course_base_id == $value->course_base_id)
                    return $value;
        });

        return $this;
    }
}
