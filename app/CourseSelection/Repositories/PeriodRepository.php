<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Period;

class PeriodRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    public function __construct($model = null) {}

    public function instance()
    {
        $this->model = $this->model === null
            ? null
            : Period::all()->sortBy('id');
        
        return $this;
    }
}
