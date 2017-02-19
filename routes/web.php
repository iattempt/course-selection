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
Route::group(['prefix' => '/member','namespace' => 'Member'], function() {
    Route::get('signin', 'Signin@index');
    Route::get('signout', 'Signout@index');
    Route::get('signup', 'Signup@index');
});
Route::group(['middleware' => 'teacher',
    'prefix' => 'teacher/{id}', 
    'namespace' => 'Teacher'], function() {
});
