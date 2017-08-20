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
    public function __construct() {}

    public function instance()
    {
        $this->model = $this->model === null
            ? null
            : User::all()->whereNotIN('name', 'admin');

        return $this; 
    }

    public function suitOwn($id)
    {
        if (!$this->model)
            return null;
        $this->model = $this->model->whereIn('id', $id);

        return $this;
    }
}
