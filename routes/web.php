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

Route::get('test', function () {
    $data['title'] = 'My Life, My Rules';
    return view('course_search', $data);
});

Route::get('/', function () {
    $data['title'] = 'My Life, My Rules';
    return view('index', $data);
});

//coursesearch
Route::get('coursesearch', 'CourseSearch@index')->middleware('authority', 'student', 'professor');

//feedback
Route::get('feedback', 'Feedback@index')->middleware('authority', 'student');

//member
Route::group(['namespace' => 'Member'], function () {
    Route::get('signin', 'Signin@index');
    Route::get('signout', 'Signout@index')->middleware('authority', 'student', 'professor');
    Route::get('signup', 'Signup@index');
});

//authority
Route::group(['middleware' => 'authority',
                 'namespace' => 'Authority'], function () {
    Route::group(['prefix' => 'modify',
                    'namespace' => 'Modify'], function () {
        Route::get('professor', 'Professor@index');
        Route::get('student', 'Student@index');
        Route::get('course', 'Course@index');
        Route::get('unit', 'Unit@index');
        Route::get('threshold', 'Threshold@index');
        Route::get('coursebase', 'CourseBase@index');
        Route::get('syllabus', 'Syllabus@index');
        Route::get('classroom', 'Classroom@index');
    });
});

//professor
Route::group(['middleware' => 'professor',
                'namespace' => 'Professor'], function() {
    Route::get('approve', 'Approve@index');
    Route::get('unitcourse', 'UnitCourse@index');
    Route::get('mycourse', 'MyCourse@index');
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
            Route::get('recommendation', 'Recommendation@index');
            Route::get('inrequired', 'InRequired@index');
            Route::get('commonrequired', 'CommonRequired@index');
            Route::get('inforceelective', 'InForceElective@index');
            Route::get('inelective', 'InElective@index');
            Route::get('outelective', 'OutElective@index');
            Route::get('general', 'General@index');
        });
    });
    Route::group(['prefix' => 'state', 
                    'namespace' => 'State'], function () {
        Route::get('presyllabus', 'PreSyllabus@index');
        Route::get('syllabus', 'Syllabus@index');
        Route::get('schedule', 'Schedule@index');
    });
});
