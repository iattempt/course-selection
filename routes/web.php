<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// check post and get class



Route::get('test', function () {
    $data['title'] = 'My Life, My Rules';
    return view('course_search', $data);
});

Route::get('/', function () {
    $data['title'] = 'My Life, My Rules';
    return view('index', $data);
});

//coursesearch
Route::get('course_search', 'CourseSearch@index')->middleware('authority', 'student', 'professor');

//feedback
Route::get('feedback', 'Feedback@index')->middleware('authority', 'student');

//member
Route::group(['namespace' => 'Member'], function () {
    Route::post('signin', 'Signin@index');
    Route::post('signout', 'Signout@index')->middleware('authority', 'student', 'professor');
    Route::post('signup', 'Signup@index')->middleware('authority');

    Route::get('signin', function () {
        $data['title'] = 'sign in';
        return view('member/sign_in');
    });
    Route::get('signup', function () {
        $data['title'] = 'sign up';
        return view('member/sign_up');
    });
    Route::get('signout', function () {
        $data['title'] = 'sign out';
        return view('member/sign_out');
    });
});

//authority
Route::group(['middleware' => 'authority',
                 'namespace' => 'Authority'], function () {
    Route::group(['prefix' => 'modify',
                    'namespace' => 'Modify'], function () {
        Route::post('professor_des', 'Professor@index');
        Route::post('student_des', 'Student@index');
        Route::post('course_des', 'Course@index');
        Route::post('unit_des', 'Unit@index');
        Route::post('threshold_des', 'Threshold@index');
        Route::post('coursebase_des', 'CourseBase@index');
        Route::post('syllabus_des', 'Syllabus@index');
        Route::post('classroom_des', 'Classroom@index');

        Route::get('professor', function () {
            $data['title'] = " modify professor";
            return view('professor', $data);
        });
        Route::get('student', function () {
            $data['title'] = " modify student";
            return view('student', $data);
        });
        Route::get('course', function () {
            $data['title'] = " modify course";
            return view('course', $data);
        });
        Route::get('unit', function () {
            $data['title'] = " modify unit ";
            return view('unit', $data);
        });
        Route::get('threshold', function () {
            $data['title'] = " modify threshold";
            return view('threshold', $data);
        });
        Route::get('coursebase', function () {
            $data['title'] = " modify course base";
            return view('course_base', $data);
        });
        Route::get('syllabus', function () {
            $data['title'] = " modify syllabus";
            return view('syllabus', $data);
        });
        Route::get('classroom', function () {
            $data['title'] = " modify classroom";
            return view('classroom', $data);
        });
    });
});

//professor
Route::group(['middleware' => 'professor',
                'namespace' => 'Professor'], function() {
    Route::get('approve', 'Approve@index');
    Route::get('unit_course', 'UnitCourse@index');
    Route::get('my_course', 'MyCourse@index');
});

//student
Route::group(['middleware' => 'student',
                'namespace' => 'Student'], function () {
    Route::group(['prefix' => 'selection',
                    'namespace' => 'Selection'], function () {
        Route::get('applyfor', 'Applyfor@index');
        Route::get('drop', 'Drop@index');
        Route::group(['prefix' => 'enroll', 
            'namespace' => 'Enroll'], function () {
            Route::get('recommendation', 'Recommendation@index');
            Route::get('in_required', 'InRequired@index');
            Route::get('common_required', 'CommonRequired@index');
            Route::get('in_force_elective', 'InForceElective@index');
            Route::get('in_elective', 'InElective@index');
            Route::get('out_elective', 'OutElective@index');
            Route::get('general', 'General@index');
        });
    });
    Route::group(['prefix' => 'state', 
                    'namespace' => 'State'], function () {
        Route::post('pre_syllabus', 'PreSyllabus@index');
        Route::post('syllabus', 'Syllabus@index');
        Route::post('schedule', 'Schedule@index');
    });
});
