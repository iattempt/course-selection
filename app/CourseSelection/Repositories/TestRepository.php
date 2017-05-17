<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Test;

class TestRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new TestRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    private function __construct()
    {
        $this->model = $this->model === null ? null : Test::all();
    }

    /**
     * return static
     * */
    function getTest()
    {
        if (!$this->model)
            return null;
        return $this->model->sortBy('id');
    }
}
