<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Course;
use App\User;
use Repository\CourseTypeRepository as CourseType;
use Repository\UnitRepository as Unit;
use Repository\TimeRepository as Time;

class CourseRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct(){}
    function instance()
    {
        $this->model = $this->model === null ? null : Course::all()->sortBy('year')->sortBy('name');
        return $this;
    }
    function store(array $inputs)
    {
        $inputs['enrollment_remain'] = $inputs['enrollment_max'];
        $inputs['enroll'] = $inputs['enrollment_max'] > $inputs['enrollment_remain'] ? 1 : 0;
        $this->store_model = Course::create($inputs);
        return $this;
    }
    function update(array $inputs, $id)
    {
        $inputs['enrollment_remain'] = $this->getById($id)->enrollment_remain;
        if ($inputs['enrollment_remain'] > $inputs['enrollment_max'])
            return $this;
        else if ($inputs['enrollment_max'] > $this->getById($id)->enrollment_max) {
            $inputs['enrollment_remain'] += $inputs['enrollment_max'] - $this->getById($id)->enrollment_max;
        }
        $inputs['enroll'] = $inputs['enrollment_remain']>0 ? 0 : 1;
        $this->getById($id)->update($inputs);
        return $this;
    }
    function addEnrollment($id)
    {
        if (!$this->model)  return null;

        $data = $this->getById($id);
        $data->enrollment_remain++;
        $data->save();
        return $this;
    }
    function suitCurrentSemester()
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('year', env('CURRENT_YEAR'))->whereIn('semester', env('CURRENT_SEMESTER'));
        return $this;
    }
    function suitSemester($semester)
    {
        if (!$this->model)  return null;

        $ys = explode(' ', $semester);
        $year = $ys[0]; $semester = $ys[1];
        $this->model = $this->model->whereIn('year', $year);
        $this->model = $this->model->whereIn('semester', $semester);
        return $this;
    }
    function suitTimes($times)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use($times) {
            foreach ($times as $time) {
                $dp = explode(' ', $time);
                $day = $dp[0]; $period = $dp[1];
                foreach ($value->times as $course_time) {
                    if ($course_time->day->id == $day 
                        && $course_time->period->id == $period)
                        return $value;
                }
            }
        });
            
        return $this;
    }
    function suitUnits($units)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use($units){
            foreach ($units as $unit) {
                if ($value->unit->id == $unit)
                    return $value;
            }
        });
        return $this;
    }
    function suitTypes($unit, $types)
    {
        if (!$this->model)  return null;

        //取得所有這些type_ids的課程
        //先過濾出我這個科系非此修別的課，將這些課排外
        //
        //取得所有此科系的對應修別
        $own_units = (new CourseType())->instance()->suitUnit($unit)->get();
        $this->model = $this->model->filter(function ($value, $key) use($own_units, $types){
            //跑過所有要求的修別
            foreach ($types as $type) {
                $hasBelongsOwnUnit = false;
                //第一階段：跑過所有設定此科系修別的課
                foreach ($own_units as $own_unit) {
                    //如果有匹配到就設為true
                    if ($own_unit->course_id == $value->id) {
                        $hasBelongsOwnUnit = true;
                        if ($own_unit->type_id == $type) {
                            return $value;
                        }
                    }
                } 
                if (!$hasBelongsOwnUnit){
                    //第三階段：此科系若沒有設定該課程修別，就過濾有無設定其餘
                    //若有設定為其餘，就匹配是否要求的修別是其餘對應的修別
                    foreach ($value->types as $vt) {
                        //unit_id: 1=>全部 2=>其餘
                        if (($vt->unit_id == 2 || $vt->unit_id == 1)
                            &&  $vt->type_id == $type)
                            return $value;
                        //確認是否搜尋通識，若是則回傳所有通識的課
                        if ($type == 1 && $vt->unit_id == 2 && ($vt->type_id == 3 || $vt->type_id == 4 || $vt->type_id == 5 || $vt->type_id ==6))
                            return $value;
                    }
                }
            }
        });
        return $this;
    }
    function suitLanguages(array $languages)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('language', $languages);
        return $this;
    }
    function suitEnroll($input)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->whereIn('enroll', $input);
        return $this;
    }
    function suitProfessorName($name)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use($name){
            foreach ($value->professors as $professor) {
                if ($professor->user && strstr($professor->user->name, $name))
                    return true;
            }
        });
        return $this;
    }
    function suitCourseName($name)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use($name) {
            if (strstr($value->name, $name))
                return true;
        });
        return $this;
    }
    function suitCurriculum($ownCurriculum)
    {
        if (!$this->model)  return null;

        $this->model = $this->model->filter(function ($value, $key) use ($ownCurriculum) {
            foreach ($ownCurriculum as $o) {
                if ($value->id === $o->course_id)
                    return $value;
            }
        });
        return $this;
    }
}
