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
    Route::get('/', 'AdminController@index')->name('admin.dashboard')->middleware('MustSetPassword:admin');
    Route::any('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('reset-password' , 'Auth\AdminLoginController@showAdminResetPassword')->name('admin.reset.password');
    Route::post('reset-password' , 'Auth\AdminLoginController@adminReplaceNewPassword')->name('admin.replace.password');


});

Route::prefix('advisor')->group(function (){
    Route::get('login' , 'Auth\AdvisorLoginController@showLoginForm')->name('advisor.login');
    Route::post('login' , 'Auth\AdvisorLoginController@login')->name('advisor.login.submit');
    Route::get('/test', function () {
        return 'hello';
    });
    Route::get('/', 'AdvisorController@index')->name('advisor.dashboard')->middleware('MustSetPassword:advisor');;

    Route::any('/logout','Auth\AdvisorLoginController@logout')->name('advisor.logout');
    Route::get('reset-password' , 'Auth\AdvisorLoginController@showAdvisorResetPassword')->name('advisor.reset.password');
    Route::post('reset-password' , 'Auth\AdvisorLoginController@advisorReplaceNewPassword')->name('advisor.replace.password');

});


Route::prefix('student')->group(function (){
    Route::get('login' , 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('login' , 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/', 'StudentController@index')->name('student.dashboard')->middleware('MustSetPassword:student');;
    Route::any('/logout','Auth\StudentLoginController@logout')->name('student.logout');
    Route::get('reset-password' , 'Auth\StudentLoginController@showStudentResetPassword')->name('student.reset.password');
    Route::post('reset-password' , 'Auth\StudentLoginController@studentReplaceNewPassword')->name('student.replace.password');

});
