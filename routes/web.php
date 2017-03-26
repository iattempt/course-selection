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


Route::get('/', 'Controller@index');
Route::get('sign_in', 'SignInController@index');
Route::post('sign_in', 'SignInController@verify');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('sign_out', 'SignOutController@index');

    Route::get('feedback', 'FeedbackController@index');
    Route::get('course_search', 'CourseSearchController@index');

//authority
    Route::get('authority', 'AuthorityController@index');
    Route::group(['prefix' => 'authority', 'namespace' => 'Authority'], function () {
        Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
            Route::get('professor', 'ProfessorController@index');
            Route::get('course', 'CourseController@index');
            Route::get('unit', 'UnitController@index');
            Route::get('syllabus', 'SyllabusController@index');
            Route::get('student', 'StudentController@index');
            Route::get('course_base', 'CourseBaseController@index');
            Route::get('threshold', 'ThresholdController@index');
            Route::get('classroom', 'ClassroomController@index');

            Route::get('professor/new', 'ProfessorController@create');
            Route::get('course/new', 'CourseController@create');
            Route::get('unit/new', 'UnitController@create');
            Route::get('syllabus/new', 'SyllabusController@create');
            Route::get('student/new', 'StudentController@create');
            Route::get('course_base/new', 'CourseBaseController@create');
            Route::get('threshold/new', 'ThresholdController@create');
            Route::get('classroom/new', 'ClassroomController@create');

            Route::post('professor', 'ProfessorController@store');
            Route::post('course', 'CourseController@store');
            Route::post('unit', 'UnitController@store');
            Route::post('syllabus', 'SyllabusController@store');
            Route::post('student', 'StudentController@store');
            Route::post('course_base', 'CourseBaseController@store');
            Route::post('threshold', 'ThresholdController@store');
            Route::post('classroom', 'ClassroomController@store');

            Route::get('professor/{id}', 'ProfessorController@show');
            Route::get('course/{id}', 'CourseController@show');
            Route::get('unit/{id}', 'UnitController@show');
            Route::get('syllabus/{id}', 'SyllabusController@show');
            Route::get('student/{id}', 'StudentController@show');
            Route::get('course_base/{id}', 'CourseBaseController@show');
            Route::get('threshold/{id}', 'ThresholdController@show');
            Route::get('classroom/{id}', 'ClassroomController@show');

            Route::get('professor/{id}/edit', 'ProfessorController@edit');
            Route::get('course/{id}/edit', 'CourseController@edit');
            Route::get('unit/{id}/edit', 'UnitController@edit');
            Route::get('syllabus/{id}/edit', 'SyllabusController@edit');
            Route::get('student/{id}/edit', 'StudentController@edit');
            Route::get('course_base/{id}/edit', 'CourseBaseController@edit');
            Route::get('threshold/{id}/edit', 'ThresholdController@edit');
            Route::get('classroom/{id}/edit', 'ClassroomController@edit');

            Route::put('professor/{id}', 'ProfessorController@update');
            Route::put('course/{id}', 'CourseController@update');
            Route::put('unit/{id}', 'UnitController@update');
            Route::put('syllabus/{id}', 'SyllabusController@update');
            Route::put('student/{id}', 'StudentController@update');
            Route::put('course_base/{id}', 'CourseBaseController@update');
            Route::put('threshold/{id}', 'ThresholdController@update');
            Route::put('classroom/{id}', 'ClassroomController@update');

            Route::delete('professor/{id}', 'ProfessorController@destory');
            Route::delete('course/{id}', 'CourseController@destory');
            Route::delete('unit/{id}', 'UnitController@destory');
            Route::delete('syllabus/{id}', 'SyllabusController@destory');
            Route::delete('student/{id}', 'StudentController@destory');
            Route::delete('course_base/{id}', 'CourseBaseController@destory');
            Route::delete('threshold/{id}', 'ThresholdController@destory');
            Route::delete('classroom/{id}', 'ClassroomController@destory');

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
