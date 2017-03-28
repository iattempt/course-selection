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

Route::get('sign_in', 'SignInController@index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('sign_out', 'SignOutController@index');

    Route::get('feedback', 'FeedbackController@index');
    Route::get('course_search', 'CourseSearchController@index');

//authority
    Route::get('authority', 'AuthorityController@index');
    Route::group(['prefix' => 'authority',
        'namespace' => 'Authority'], function () {
            Route::get('modify', 'ModifyController@index');
            Route::group(['prefix' => 'modify', 
                'namespace' => 'Modify'], function () {
            Route::resource('classroom', 'ClassroomController');
            Route::resource('course_base', 'CourseBaseController');
            Route::resource('course', 'CourseController');
            Route::resource('professor', 'ProfessorController');
            Route::resource('student', 'StudentController');
            Route::resource('syllabus', 'SyllabusController');
            Route::resource('threshold', 'ThresholdController');
            Route::resource('unit', 'UnitController');
            });
        });

//professor
    Route::get('professor', 'ProfessorController@index');
    Route::group(['prefix' => 'professor', 
        'namespace' => 'Professor'], function() {
        Route::get('approve', 'ApproveController@index');
        Route::get('unit_course', 'UnitCourseController@index');
        Route::get('my_course', 'MyCourseController@index');
        });
 
//student
    Route::get('student', 'StudentController@index');
    Route::group(['prefix' => 'student', 
        'namespace' => 'Student'], function () {
        Route::get('pre_syllabus', 'PreSyllabusController@index');
        Route::get('syllabus', 'SyllabusController@index');
        Route::get('threshold', 'ThresholdController@index');

        Route::get('selection', 'SelectionController@index');
        Route::group(['prefix' => 'selection', 
            'namespace' => 'Selection'], function () {
            Route::get('apply_for', 'ApplyForController@index');
            Route::get('drop', 'DropController@index');
            
            Route::get('enroll', 'EnrollController@index');
            Route::group(['prefix' => 'enroll', 
                'namespace' => 'Enroll'], function () {
                Route::get('common_required', 'CommonRequiredController@index');
                Route::get('elective', 'ElectiveController@index');
                Route::get('general', 'GeneralController@index');
                Route::get('in_elective', 'InElectiveController@index');
                Route::get('in_force_elective', 'InForceElectiveController@index');
                Route::get('in_required', 'InRequiredController@index');
                Route::get('recommendation', 'RecommendationController@index');
                });
            });
        });
});
