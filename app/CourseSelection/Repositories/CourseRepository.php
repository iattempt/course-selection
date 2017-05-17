<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\CourseBase;
use Model\Course;
use Model\CoursePeriod;
use Model\CourseProfessor;
use Model\CourseTime;
use Model\CourseType;
use Model\Classroom;

class CourseRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new CourseRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    private function __construct()
    {
        $this->model = $this->model === null ? null : Course::all();
    }

    /**
     * return static
     * */
    function all()
    {
        if (!$this->model)
            return null;
        return $this->model->sortBy('id');
    }
}
