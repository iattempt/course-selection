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
Route::get('/', 'ClassroomController@index');


Route::group(['middleware' => 'guest'], function () {
    Route::group(['namespace' => 'Member'], function () {
        Route::get('sign_in', 'SignInController@index');
        Route::get('sign_out', 'SignOutController@index');
    });

    Route::get('feedback', 'FeedbackController@index');
    Route::get('course_search', 'CourseSearchController@index');

    Route::post('course_search', 'CourseSearchController@enroll');

//authority
    Route::get('authority', 'AuthorityController@index');
    Route::group(['namespace' => 'Authority'], function () {
        Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
            Route::get('professor', 'ProfessorController@index');
            Route::get('student', 'StudentController@index');
            Route::get('course', 'CourseController@index');
            Route::get('course_base', 'CourseBaseController@index');
            Route::get('unit', 'UnitController@index');
            Route::get('threshold', 'ThresholdController@index');
            Route::get('syllabus', 'SyllabusController@index');
            Route::get('classroom', 'ClassroomController@index');

            Route::post('professor', 'ProfessorController@verify');
            Route::post('student', 'StudentController@verify');
            Route::post('course', 'CourseController@verify');
            Route::post('course_base', 'CourseBaseController@verify');
            Route::post('unit', 'UnitController@verify');
            Route::post('threshold', 'ThresholdController@verify');
            Route::post('syllabus', 'SyllabusController@verify');
            Route::post('classroom', 'ClassroomController@verify');
        });
    });

//professor
    Route::get('professor', 'ProfessorController@index');
    Route::group(['prefix' => 'professor',
            'namespace' => 'Professor'], function() {
        Route::get('approve', 'ApproveController@index');
        Route::get('unit_course', 'UnitCourseController@index');
        Route::get('my_course', 'MyCourseController@index');

        Route::post('approve', 'ApproveController@verify');
    });    
 
//student
    Route::get('student', 'StudentController@index');
    Route::group(['prefix' => 'student',
            'namespace' => 'Student'], function () {
        Route::group(['prefix' => 'selection',
                'namespace' => 'Selection'], function () {
            Route::get('apply_for', 'ApplyForController@index');
            Route::get('drop', 'DropController@index');
            Route::group(['prefix' => 'enroll', 
                'namespace' => 'Enroll'], function () {
                Route::get('recommendation', 'RecommendationController@index');
                Route::get('in_required', 'InRequiredController@index');
                Route::get('common_required', 'CommonRequiredController@index');
                Route::get('in_force_elective', 'InForceElectiveController@index');
                Route::get('in_elective', 'InElectiveController@index');
                Route::get('out_elective', 'OutElectiveController@index');
                Route::get('general', 'GeneralController@index');

                Route::post('recommendation', 'RecommendationController@verify');
                Route::post('in_required', 'InRequiredController@verify');
                Route::post('common_required', 'CommonRequiredController@verify');
                Route::post('in_force_elective', 'InForceElectiveController@verify');
                Route::post('in_elective', 'InElectiveController@verify');
                Route::post('out_elective', 'OutElectiveController@verify');
                Route::post('general', 'GeneralController@verify');
            });

            Route::post('apply_for', 'ApplyForController@verify');
            Route::post('drop', 'DropController@verify');
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
