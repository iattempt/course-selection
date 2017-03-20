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
    Route::get('sign_in', 'SignIn@index');
    Route::get('sign_out', 'SignOut@index');
});
//endcommn

//coursesearch
//Route::post('course_search', 'CourseSearch@index')->middleware('authority', 'student', 'professor');
Route::post('course_search', 'CourseSearch@index')->middleware('authority');

//authority
Route::group(['middleware' => 'authority'], function () {
    Route::post('authority', 'Authority@index');
    Route::group(['prefix' => 'authority',
            'namespace' => 'Authority'], function () {
        Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
        Route::post('professor', 'Professor@index');
        Route::post('student', 'Student@index');
        Route::post('course', 'Course@index');
        Route::post('course_base', 'CourseBase@index');
        Route::post('unit', 'Unit@index');
        Route::post('threshold', 'Threshold@index');
        Route::post('syllabus', 'Syllabus@index');
        Route::post('classroom', 'Classroom@index');
    });
    });
});

//professor
Route::group(['middleware' => 'professor'], function() {
    Route::get('professor', 'Professor@index');
    Route::group(['prefix' => 'professor',
            'namespace' => 'Professor'], function() {
        Route::post('approve', 'Approve@index');
        Route::post('unit_course', 'UnitCourse@index');
        Route::post('my_course', 'MyCourse@index');
    });    
});
 
//student
Route::group(['middleware' => 'student'], function() {
    Route::post('student', 'Student@index');
    Route::group(['prefix' => 'student',
            'namespace' => 'Student'], function () {
        Route::group(['prefix' => 'selection',
                'namespace' => 'Selection'], function () {
            Route::post('apply_for', 'ApplyFor@index');
            Route::post('drop', 'Drop@index');
            Route::group(['prefix' => 'enroll', 
                'namespace' => 'Enroll'], function () {
                Route::post('recommendation', 'Recommendation@index');
                Route::post('in_required', 'InRequired@index');
                Route::post('common_required', 'CommonRequired@index');
                Route::post('in_force_elective', 'InForceElective@index');
                Route::post('in_elective', 'InElective@index');
                Route::post('out_elective', 'OutElective@index');
                Route::post('general', 'General@index');
            });
        });
        Route::group(['prefix' => 'state', 
                'namespace' => 'State'], function () {
            Route::post('pre_syllabus', 'PreSyllabus@index');
            Route::post('syllabus', 'Syllabus@index');
            Route::post('schedule', 'Schedule@index');
        });
    });
});
