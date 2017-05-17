<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ProfessorRepository extends BaseRepository
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
        $this->model = $this->model === null ? null : User::all()->whereIn('type', ['professor']);
        return $this; 
    }
}
