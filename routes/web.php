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
//
Route::get('/', 'Controller@index');
Route::get('sign_in', 'Member\SignInController@index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('sign_out', 'Member\SignOutController@index');

    Route::get('feedback', 'FeedbackController@index');
    Route::get('course_search', 'CourseSearchController@index');

//authority
    Route::get('authority', 'AuthorityController@index');
    Route::group(['namespace' => 'Authority'], function () {
        Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
            Route::get('professor', 'ProfessorController@index');
            Route::post('professor', 'ProfessorController@verify');
            Route::get('course', 'CourseController@index');
            Route::post('course', 'CourseController@verify');
            Route::get('unit', 'UnitController@index');
            Route::post('unit', 'UnitController@verify');
            Route::get('syllabus', 'SyllabusController@index');
            Route::post('syllabus', 'SyllabusController@verify');
            Route::get('student', 'StudentController@index');
            Route::post('student', 'StudentController@verify');
            Route::get('course_base', 'CourseBaseController@index');
            Route::post('course_base', 'CourseBaseController@verify');
            Route::get('threshold', 'ThresholdController@index');
            Route::post('threshold', 'ThresholdController@verify');
            Route::get('classroom', 'ClassroomController@index');
            Route::post('classroom', 'ClassroomController@verify');
        });
    });

//professor
    Route::get('professor', 'ProfessorController@index');
    Route::group(['prefix' => 'professor',
            'namespace' => 'Professor'], function() {
        Route::get('approve', 'ApproveController@index');
        Route::post('approve', 'ApproveController@verify');
        Route::get('unit_course', 'UnitCourseController@index');
        Route::get('my_course', 'MyCourseController@index');
    });    
 
//student
    Route::get('student', 'StudentController@index');
    Route::group(['prefix' => 'student',
            'namespace' => 'Student'], function () {
        Route::group(['prefix' => 'selection',
                'namespace' => 'Selection'], function () {
            Route::get('apply_for', 'ApplyForController@index');
            Route::post('apply_for', 'ApplyForController@verify');
            Route::get('drop', 'DropController@index');
            Route::post('drop', 'DropController@verify');

            Route::group(['prefix' => 'enroll', 
                'namespace' => 'Enroll'], function () {
                Route::get('recommendation', 'RecommendationController@index');
                Route::post('recommendation', 'RecommendationController@verify');
                Route::get('in_required', 'InRequiredController@index');
                Route::post('in_required', 'InRequiredController@verify');
                Route::get('common_required', 'CommonRequiredController@index');
                Route::post('common_required', 'CommonRequiredController@verify');
                Route::get('in_force_elective', 'InForceElectiveController@index');
                Route::post('in_force_elective', 'InForceElectiveController@verify');
                Route::get('in_elective', 'InElectiveController@index');
                Route::post('in_elective', 'InElectiveController@verify');
                Route::get('out_elective', 'OutElectiveController@index');
                Route::post('out_elective', 'OutElectiveController@verify');
                Route::get('general', 'GeneralController@index');
                Route::post('general', 'GeneralController@verify');
            });
        });
        Route::group(['prefix' => 'state', 
                'namespace' => 'State'], function () {
            Route::get('pre_syllabus', 'PreSyllabusController@index');
            Route::get('syllabus', 'SyllabusController@index');
            Route::get('threshold', 'ThresholdController@index');
            Route::get('threshold_print', 'ThresholdController@print');
        });
    });
});
