<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Day;

class DayRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new DayRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    private function __construct()
    {
        $this->model = $this->model === null ? null : Day::all();
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
