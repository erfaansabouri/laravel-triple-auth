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

Route::get('/', 'HomeController@landingPage')->name('landing-page');

Route::prefix('admin')->group(function (){

    Route::get('login' , 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login' , 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard')->middleware('MustSetPassword:admin');
    Route::any('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/reset-password' , 'Auth\AdminLoginController@showAdminResetPassword')->name('admin.reset.password');
    Route::post('/reset-password' , 'Auth\AdminLoginController@adminReplaceNewPassword')->name('admin.replace.password');

    /*ADMIN -> ADVISORS MANAGEMENT*/
    Route::get('/advisors', 'AdminController@advisorsIndex')->name('admin.advisors.index')->middleware('MustSetPassword:admin');
    Route::get('/advisors/create', 'AdminController@advisorsCreate')->name('admin.advisors.create')->middleware('MustSetPassword:admin');
    Route::post('/advisors/store', 'AdminController@advisorsStore')->name('admin.advisors.store')->middleware('MustSetPassword:admin');
    Route::get('/advisors/edit/{id}', 'AdminController@advisorsEdit')->name('admin.advisors.edit')->middleware('MustSetPassword:admin');
    Route::put('/advisors/edit/{id}', 'AdminController@advisorsUpdate')->name('admin.advisors.update')->middleware('MustSetPassword:admin');
    /*ADMIN -> COLLEGES MANAGEMENT*/
    Route::get('/colleges', 'AdminController@collegesIndex')->name('admin.colleges.index')->middleware('MustSetPassword:admin');
    Route::get('/colleges/create', 'AdminController@collegesCreate')->name('admin.colleges.create')->middleware('MustSetPassword:admin');
    Route::post('/colleges/store', 'AdminController@collegesStore')->name('admin.colleges.store')->middleware('MustSetPassword:admin');
    Route::get('/colleges/edit/{id}', 'AdminController@collegesEdit')->name('admin.colleges.edit')->middleware('MustSetPassword:admin');
    Route::put('/colleges/edit/{id}', 'AdminController@collegesUpdate')->name('admin.colleges.update')->middleware('MustSetPassword:admin');
    /*ADMIN -> FIELDS MANAGEMENT*/
    Route::get('/fields', 'AdminController@fieldsIndex')->name('admin.fields.index')->middleware('MustSetPassword:admin');
    Route::get('/fields/create', 'AdminController@fieldsCreate')->name('admin.fields.create')->middleware('MustSetPassword:admin');
    Route::post('/fields/store', 'AdminController@fieldsStore')->name('admin.fields.store')->middleware('MustSetPassword:admin');
    Route::get('/fields/edit/{id}', 'AdminController@fieldsEdit')->name('admin.fields.edit')->middleware('MustSetPassword:admin');
    Route::put('/fields/edit/{id}', 'AdminController@fieldsUpdate')->name('admin.fields.update')->middleware('MustSetPassword:admin');
    /*ADMIN -> BRANCHES MANAGEMENT*/
    Route::get('/branches', 'AdminController@branchesIndex')->name('admin.branches.index')->middleware('MustSetPassword:admin');
    Route::get('/branches/create', 'AdminController@branchesCreate')->name('admin.branches.create')->middleware('MustSetPassword:admin');
    Route::post('/branches/store', 'AdminController@branchesStore')->name('admin.branches.store')->middleware('MustSetPassword:admin');
    Route::get('/branches/edit/{id}', 'AdminController@branchesEdit')->name('admin.branches.edit')->middleware('MustSetPassword:admin');
    Route::put('/branches/edit/{id}', 'AdminController@branchesUpdate')->name('admin.branches.update')->middleware('MustSetPassword:admin');
    /*ADMIN -> CHARTS MANAGEMENT*/
    Route::get('/charts', 'AdminController@chartsIndex')->name('admin.charts.index')->middleware('MustSetPassword:admin');
    Route::get('/charts/create', 'AdminController@chartsCreate')->name('admin.charts.create')->middleware('MustSetPassword:admin');
    Route::post('/charts/store', 'AdminController@chartsStore')->name('admin.charts.store')->middleware('MustSetPassword:admin');
    Route::get('/charts/edit/{id}', 'AdminController@chartsEdit')->name('admin.charts.edit')->middleware('MustSetPassword:admin');
    Route::put('/charts/edit/{id}', 'AdminController@chartsUpdate')->name('admin.charts.update')->middleware('MustSetPassword:admin');
    Route::delete('/charts/delete/{id}', 'AdminController@chartsDestroy')->name('admin.charts.destroy')->middleware('MustSetPassword:admin');

    /*ADMIN -> semesters MANAGEMENT*/
    Route::get('/semesters', 'AdminController@semestersIndex')->name('admin.semesters.index')->middleware('MustSetPassword:admin');
    Route::get('/semesters/create', 'AdminController@semestersCreate')->name('admin.semesters.create')->middleware('MustSetPassword:admin');
    Route::post('/semesters/store', 'AdminController@semestersStore')->name('admin.semesters.store')->middleware('MustSetPassword:admin');
    Route::get('/semesters/edit/{id}', 'AdminController@semestersEdit')->name('admin.semesters.edit')->middleware('MustSetPassword:admin');
    Route::put('/semesters/edit/{id}', 'AdminController@semestersUpdate')->name('admin.semesters.update')->middleware('MustSetPassword:admin');
    Route::delete('/semesters/delete/{id}', 'AdminController@semestersDestroy')->name('admin.semesters.destroy')->middleware('MustSetPassword:admin');


    /*ADMIN -> courses MANAGEMENT*/
    Route::get('/courses', 'AdminController@coursesIndex')->name('admin.courses.index')->middleware('MustSetPassword:admin');
    Route::get('/courses/create', 'AdminController@coursesCreate')->name('admin.courses.create')->middleware('MustSetPassword:admin');
    Route::post('/courses/store', 'AdminController@coursesStore')->name('admin.courses.store')->middleware('MustSetPassword:admin');
    Route::get('/courses/edit/{id}', 'AdminController@coursesEdit')->name('admin.courses.edit')->middleware('MustSetPassword:admin');
    Route::put('/courses/edit/{id}', 'AdminController@coursesUpdate')->name('admin.courses.update')->middleware('MustSetPassword:admin');

});

Route::prefix('advisor')->group(function (){
    Route::get('login' , 'Auth\AdvisorLoginController@showLoginForm')->name('advisor.login');
    Route::post('login' , 'Auth\AdvisorLoginController@login')->name('advisor.login.submit');
    Route::get('/', 'AdvisorController@index')->name('advisor.dashboard')->middleware('MustSetPassword:advisor');
    Route::any('/logout','Auth\AdvisorLoginController@logout')->name('advisor.logout');
    Route::get('reset-password' , 'Auth\AdvisorLoginController@showAdvisorResetPassword')->name('advisor.reset.password');
    Route::post('reset-password' , 'Auth\AdvisorLoginController@advisorReplaceNewPassword')->name('advisor.replace.password');

    /*ADVISOR -> Student Management*/
    Route::get('/students', 'AdvisorController@studentsIndex')->name('advisor.students.index')->middleware('MustSetPassword:advisor');
    Route::get('/students/create', 'AdvisorController@studentsCreate')->name('advisor.students.create')->middleware('MustSetPassword:advisor');
    Route::post('/students/store', 'AdvisorController@studentsStore')->name('advisor.students.store')->middleware('MustSetPassword:advisor');
    Route::get('/students/edit/{id}', 'AdvisorController@studentsEdit')->name('advisor.students.edit')->middleware('MustSetPassword:advisor');
    Route::put('/students/edit/{id}', 'AdvisorController@studentsUpdate')->name('advisor.students.update')->middleware('MustSetPassword:advisor');


});


Route::prefix('student')->group(function (){
    Route::get('login' , 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('login' , 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/', 'StudentController@index')->name('student.dashboard')->middleware('MustSetPassword:student');;
    Route::any('/logout','Auth\StudentLoginController@logout')->name('student.logout');
    Route::get('reset-password' , 'Auth\StudentLoginController@showStudentResetPassword')->name('student.reset.password');
    Route::post('reset-password' , 'Auth\StudentLoginController@studentReplaceNewPassword')->name('student.replace.password');

});
