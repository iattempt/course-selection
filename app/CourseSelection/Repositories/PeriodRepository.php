<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Period;

class PeriodRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new PeriodRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct($model = null)
    {
        $this->model = $this->model === null ? null : Period::all();
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
