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
    {}

    function instance()
    {
        $this->model = $this->model === null ? null : User::all()->whereNotIN('name', 'admin');
        return $this; 
    }
}
