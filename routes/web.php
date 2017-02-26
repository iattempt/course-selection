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

Route::get('/', function () {
    return view('welcome');
});

//selection
Route::get('selection', 'Selection@index')->middleware('authority', 'student');

//feedback
Route::get('feedback', 'Feedback@index')->middleware('authority', 'student');

//member
Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
    Route::get('signin', 'Signin@index');
    Route::get('signout', 'Signout@index')->middleware('authority', 'student');
    Route::get('signup', 'Signup@index');
});

//authority
Route::group(['middleware' => 'authority',
                 'namespace' => 'Authority'], function () {
    Route::group(['prefix' => 'modify',
                    'namespace' => 'Modify'], function () {
        Route::group(['prefix' => 'course',
                        'namespace' => 'Course'], function () {
            Route::get('category', 'Category@index');
            Route::get('semester', 'Semester@index');
        });
        Route::group(['prefix' => 'human',
                        'namespace' => 'Human'], function () {
            Route::get('student', 'Student@index');
            Route::get('teacher', 'Teacher@index');
        });
        Route::group(['prefix' => 'structure',
                        'namespace' => 'Structure'], function () {
            Route::get('category', 'Category@index');
            Route::get('college', 'College@index');
            Route::get('department', 'Department@index');
        });
    });
    Route::get('approve', 'Approve@index');
    Route::get('listcourse', 'Listcourse@index');
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
            Route::get('common', 'Common@index');
            Route::get('inforceelective', 'InForceElective@index');
            Route::get('recommendation', 'Recommendation@index');
            Route::get('educational', 'Educational@index');
            Route::get('inrequired', 'InRequired@index');
            Route::get('inelective', 'InElective@index');
            Route::get('outelective', 'OutElective@index');
        });
    });
    Route::group(['prefix' => 'state', 
                    'namespace' => 'State'], function () {
        Route::get('presyllabus', 'PreSyllabus@index');
        Route::get('syllabus', 'Syllabus@index');
        Route::get('threshold', 'Threshold@index');
    });
});
