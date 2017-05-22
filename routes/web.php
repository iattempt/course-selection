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

Auth::routes();

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('test', 'TestController@index');

//common
    Route::group(['middleware' => 'common'], function () {
        Route::group(['namespace' => 'Common'], function() {
            Route::get('feedback', 'FeedbackController@index');
            Route::post('feedback', 'FeedbackController@store');
            Route::resource('course_search', 'CourseSearchController', ['only' => ['index', 'store']]);
        });
    });
//authority
    Route::group(['middleware' => 'authority'], function () {
        Route::get('authority', 'AuthorityController@index');
        Route::group(['prefix' => 'authority', 'namespace' => 'Authority'], function () {
            Route::get('modify', 'ModifyController@index');
            Route::group(['prefix' => 'modify', 'namespace' => 'Modify'], function () {
                Route::resource('admin', 'AdminController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('professor', 'ProfessorController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('student', 'StudentController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('classroom', 'ClassroomController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('course_base', 'CourseBaseController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('course', 'CourseController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('course_professor', 'CourseProfessorController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('course_time', 'CourseTimeController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('course_type', 'CourseTypeController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('threshold1', 'Threshold1Controller', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('threshold2', 'Threshold2Controller', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::resource('unit', 'UnitController', ['only' => ['index', 'store', 'update', 'destroy']]);
                Route::get('export_sql', 'ExportSQLController@index');
            });
        });
    });

//professor
    Route::group(['middleware' => 'professor'], function () {
        Route::get('professor', 'ProfessorController@index');
        Route::group(['prefix' => 'professor', 'namespace' => 'Professor'], function() {
            Route::get('approve', 'ApproveController@index');
            Route::get('unit_course', 'UnitCourseController@index');
            Route::get('my_course', 'MyCourseController@index');
        });
    });
 
//student
    Route::group(['middleware' => 'student'], function () {
        Route::get('student', 'StudentController@index');
        Route::group(['prefix' => 'student', 'namespace' => 'Student'], function () {
            Route::group(['prefix' => 'state', 'namespace' => 'State'], function () {
                Route::get('curriculum', 'CurriculumController@index');
                Route::get('threshold', 'ThresholdController@index');
            });

            Route::group(['prefix' => 'selection', 'namespace' => 'Selection'], function () {
                Route::get('drop', 'DropController@index');
                Route::delete('drop/{id}', 'DropController@destroy');
                
                Route::get('enroll', 'EnrollController@index');
                Route::group(['prefix' => 'enroll', 'namespace' => 'Enroll'], function () {
                    Route::get('apply_for', 'ApplyForController@index');
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
});
