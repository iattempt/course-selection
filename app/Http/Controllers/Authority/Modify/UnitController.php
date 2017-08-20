<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Authority\ModifyController;
use Model\Unit;
use App\User;
use Illuminate\Support\Facades\Auth;

class UnitController extends ModifyController
{
    public function __construct() {
        parent::__construct();
        $this->general->title = 'Modify unit';
        $this->general->view_path .= '/unit';
    }

    public function index(Request $request) {
        $this->general->info = user::find(auth::user()->id);
        $this->general->lists = $this->unit->instance()->get();

        return view($this->general->view_path, ['general' => $this->general]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->only(['name', 'unit_base_id']);
            $this->unit->instance()->store($inputs);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('authority/modify/unit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $inputs = $request->only(['name', 'unit_base_id']);
            $this->unit->instance()->update($inputs, $id);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('authority/modify/unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->unit->instance()->destroy($id);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('authority/modify/unit');
    }
}
