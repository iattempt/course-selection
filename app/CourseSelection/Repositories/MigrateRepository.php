<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Curriculum;

class MigrateRepository extends BaseRepository
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
            : Curriculum::all()->sortBy('id');

        return $this;
    }

    public function changeState()
    {
        //warning: 這邊順序不能隨便變更
        $this->changeStateCurrent2Finish();
        $this->changeStatePreselection2Current();
    }

    public function changeStatePreselection2Current()
    {
        $pre2cur = $this->model->whereIn('state', ['預選中']);
        foreach($pre2cur as $value) {
            $value->state = '修課中';
            $value->save();
        }
    }

    public function changeStateCurrent2Finish()
    {
        $cur2fin = $this->model->whereIn('state', ['修課中']);
        foreach($cur2fin as $value) {
            $value->state = '已修完';
            $value->save();
        }
    }
}
