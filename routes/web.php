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
    Route::post('sign_in', 'Signin@index');
    Route::post('sign_out', 'Signout@index')->middleware('authority', 'student', 'professor');
    Route::post('sign_up', 'Signup@index')->middleware('authority');

    Route::get('sign_in', function () {
        $data['title'] = 'sign in';
        return view('member/sign_in');
    });
    Route::get('sign_up', function () {
        $data['title'] = 'sign up';
        return view('member/sign_up');
    });
    Route::get('sign_out', function () {
        $data['title'] = 'sign out';
        return view('member/sign_out');
    });
});

//authority
Route::group(['middleware' => 'authority',
                'prefix' => 'authority',
                'namespace' => 'Authority'], function () {
    Route::group(['prefix' => 'modify',
                    'namespace' => 'Modify'], function () {
        Route::post('professor', 'Professor@index');
        Route::post('student', 'Student@index');
        Route::post('course', 'Course@index');
        Route::post('unit', 'Unit@index');
        Route::post('threshold', 'Threshold@index');
        Route::post('course_base', 'CourseBase@index');
        Route::post('syllabus', 'Syllabus@index');
        Route::post('classroom', 'Classroom@index');

        Route::get('professor', function () {
            $data['title'] = " modify professor";
            return view('authority/modify/professor', $data);
        });
        Route::get('student', function () {
            $data['title'] = " modify student";
            return view('authority/modify/student', $data);
        });
        Route::get('course', function () {
            $data['title'] = " modify course";
            return view('authority/modify/course', $data);
        });
        Route::get('unit', function () {
            $data['title'] = " modify unit ";
            return view('authority/modify/unit', $data);
        });
        Route::get('threshold', function () {
            $data['title'] = " modify threshold";
            return view('authority/modify/threshold', $data);
        });
        Route::get('course_base', function () {
            $data['title'] = " modify course base";
            return view('authority/modify/course_base', $data);
        });
        Route::get('syllabus', function () {
            $data['title'] = " modify syllabus";
            return view('authority/modify/syllabus', $data);
        });
        Route::get('classroom', function () {
            $data['title'] = " modify classroom";
            return view('authority/modify/classroom', $data);
        });
    });
});

//professor
Route::group(['middleware' => 'professor',
                'prefix' => 'professor',
                'namespace' => 'Professor'], function() {
    Route::get('approve', 'Approve@index');
    Route::get('unit_course', 'UnitCourse@index');
    Route::get('my_course', 'MyCourse@index');
});

//student
Route::group(['middleware' => 'student',
                'prefix' => 'student',
                'namespace' => 'Student'], function () {
    Route::group(['prefix' => 'selection',
                    'namespace' => 'Selection'], function () {
        Route::get('apply_for', 'Applyfor@index');
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
