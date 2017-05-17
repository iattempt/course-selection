<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Type;

class TypeRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new TypeRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    private function __construct()
    {
        $this->model = $this->model === null ? null : Type::all();
    }

    /**
     * return static
     * */
    function all()
    {
        if (!$this->model)
            return null;
        return $this->model->sortBy('name');
    }

    function getOwn($id)
    {
        if (!$this->model)
            return null;
        return $this->model->where('student_id', $id);
    }
}
