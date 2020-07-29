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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){
    Route::get('login' , 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login' , 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('advisor')->group(function (){
    Route::get('login' , 'Auth\AdvisorLoginController@showLoginForm')->name('advisor.login');
    Route::post('login' , 'Auth\AdvisorLoginController@login')->name('advisor.login.submit');
    Route::get('/', 'AdvisorController@index')->name('advisor.dashboard');
    Route::get('/logout','Auth\AdvisorLoginController@logout')->name('advisor.logout');
});


Route::prefix('student')->group(function (){
    Route::get('login' , 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('login' , 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/', 'StudentController@index')->name('student.dashboard');
    Route::get('/logout','Auth\StudentLoginController@logout')->name('student.logout');
});
