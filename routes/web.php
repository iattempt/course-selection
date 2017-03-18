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

//common
//feedback
Route::get('feedback', 'Feedback@index')->middleware('authority', 'student');

//member
Route::group(['namespace' => 'Member'], function () {
    Route::match(['get', 'post'], 'sign_in', 'SignIn@index');
    Route::match(['get', 'post'], 'sign_out', 'SignOut@index')->middleware('authority', 'student', 'professor');
});
//endcommn

//coursesearch
Route::get('course_search', 'CourseSearch@index')->middleware('authority', 'student', 'professor');

//authority
Route::get('authority', 'Authority@index');
Route::group(['middleware' => 'authority',
                'prefix' => 'authority',
                'namespace' => 'Authority'], function () {
    Route::group(['prefix' => 'modify',
                    'namespace' => 'Modify'], function () {
        Route::get('professor', 'Professor@index');
        Route::get('student', 'Student@index');
        Route::get('course', 'Course@index');
        Route::get('course_base', 'CourseBase@index');
        Route::get('unit', 'Unit@index');
        Route::get('threshold', 'Threshold@index');
        Route::get('syllabus', 'Syllabus@index');
        Route::get('classroom', 'Classroom@index');
    });
});

//professor
Route::get('professor', 'Professor@index');
Route::group(['middleware' => 'professor',
                'prefix' => 'professor',
                'namespace' => 'Professor'], function() {
    Route::get('approve', 'Approve@index');
    Route::get('unit_course', 'UnitCourse@index');
    Route::get('my_course', 'MyCourse@index');
});

//student
Route::get('student', 'Student@index');
Route::group(['middleware' => 'student',
                'prefix' => 'student',
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
        });
    });
    Route::group(['prefix' => 'state', 
                    'namespace' => 'State'], function () {
        Route::get('pre_syllabus', 'PreSyllabus@index');
        Route::get('syllabus', 'Syllabus@index');
        Route::get('schedule', 'Schedule@index');
    });
});
