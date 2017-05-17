<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRepository extends BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    function __construct()
    {
        $this->model = $this->model === null ? null : User::all();
    }

    function authority()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('type', ['authority']);
        $this->model = $this->model->whereNotIn('name', ['admin']);
        return $this;
    }

    function student()
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('type', ['student']);
        return $this;
    }
}
