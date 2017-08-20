<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Feedback;

class FeedbackRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null ? null  : Feedback::all();

        return $this;
    }
}
