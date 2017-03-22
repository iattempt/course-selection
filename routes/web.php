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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function () {
    Route::group(['namespace' => 'Member'], function () {
        Route::get('sign_in', 'SignIn@index');
        Route::get('sign_out', 'SignOut@index');
    });

    Route::get('feedback', 'Feedback@index');
    Route::get('course_search', 'CourseSearch@index');

    Route::post('course_search', 'CourseSearch@enroll');

//authority
    Route::get('authority', 'Authority@index');
    Route::group(['prefix' => 'authority',
            'namespace' => 'Authority'], function () {
        Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
            Route::get('professor', 'Professor@index');
            Route::get('student', 'Student@index');
            Route::get('course', 'Course@index');
            Route::get('course_base', 'CourseBase@index');
            Route::get('unit', 'Unit@index');
            Route::get('threshold', 'Threshold@index');
            Route::get('syllabus', 'Syllabus@index');
            Route::get('classroom', 'Classroom@index');

            Route::post('professor', 'Professor@verify');
            Route::post('student', 'Student@verify');
            Route::post('course', 'Course@verify');
            Route::post('course_base', 'CourseBase@verify');
            Route::post('unit', 'Unit@verify');
            Route::post('threshold', 'Threshold@verify');
            Route::post('syllabus', 'Syllabus@verify');
            Route::post('classroom', 'Classroom@verify');
        });
    });

//professor
    Route::get('professor', 'Professor@index');
    Route::group(['prefix' => 'professor',
            'namespace' => 'Professor'], function() {
        Route::get('approve', 'Approve@index');
        Route::get('unit_course', 'UnitCourse@index');
        Route::get('my_course', 'MyCourse@index');

        Route::post('approve', 'Approve@verify');
    });    
 
//student
    Route::get('student', 'Student@index');
    Route::group(['prefix' => 'student',
            'namespace' => 'Student'], function () {
        Route::group(['prefix' => 'selection',
                'namespace' => 'Selection'], function () {
            Route::get('apply_for', 'ApplyFor@index');
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

                Route::post('recommendation', 'Recommendation@verify');
                Route::post('in_required', 'InRequired@verify');
                Route::post('common_required', 'CommonRequired@verify');
                Route::post('in_force_elective', 'InForceElective@verify');
                Route::post('in_elective', 'InElective@verify');
                Route::post('out_elective', 'OutElective@verify');
                Route::post('general', 'General@verify');
            });

            Route::post('apply_for', 'ApplyFor@verify');
            Route::post('drop', 'Drop@verify');
        });
        Route::group(['prefix' => 'state', 
                'namespace' => 'State'], function () {
            Route::get('pre_syllabus', 'PreSyllabus@index');
            Route::get('syllabus', 'Syllabus@index');
            Route::get('threshold', 'Threshold@index');
            Route::get('threshold_print', 'Threshold@print');
        });
    });
});
