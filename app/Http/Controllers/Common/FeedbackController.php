<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CourseSelection\Models\Feedback;
use App\CourseSelection\Models\User;

class FeedbackController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Feedback";
    }
    function index() {
        $this->general->identity = Auth::user()->getType();
        return view('common/feedback', ['general' => $this->general]);
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
            if ($request->has('subject', 'context')) {
                $data = new Feedback();
                $data->user_id = Auth::user()->id;
                $data->subject = $request->input('subject');
                $data->context = $request->input('context');
                $data->save();
            }
            return redirect('feedback');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
