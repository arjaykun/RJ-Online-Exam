<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome');

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);



//admin and staff routes
Route::prefix('/admin')->group(function () {
  Route::get('dashboard', 'HomeController@index')->name('admin_dashboard');
	Route::resource('classes', 'KlassController');
	Route::resource('classes/{class}/tests', 'TestController')->except(['index']);
	Route::resource('tests/{test}/questions', 'QuestionController')->except(['index', 'show']);

	//view test grades
	Route::get('classes/{class}/tests/{test}/grades', 'GradeController@view_test_grades')->name('test_grades');
	//view class grades
	Route::get('classes/{class}/grades', 'GradeController@view_class_grades')->name('class_grades');

	//test activation
	Route::get('classes/{class}/tests/{test}/activate', 'TestActivationController@show')->name('activate_test');
	Route::put('classes/{class}/tests/{test}/update', 'TestActivationController@activate')->name('update_test');
	Route::post('classes/{class}/tests/{test}/deactivate', 'TestActivationController@deactivate')->name('deactivate_test');


	//class students
	Route::resource('students', 'StudentController');

	//change password routes
	Route::get('change-password/{user}', 'PasswordController@change_password')->name('user-change-password')->middleware('password.confirm');

	Route::put('update-password/{user}', 'PasswordController@update_password')->name('user-update-password')->middleware('password.confirm');

	//enrollement
	Route::get('classes/{class}/students', 'EnrollmentController@index')->name('view_students');
	Route::get('classes/{class}/enrollment', 'EnrollmentController@create')->name('enroll_student_to_class');

	Route::post('classes/{class}/students', 'EnrollmentController@searchStudent')->name('search_student');
	Route::post('classes/{class}/students/{student}', 'EnrollmentController@enrollStudent')->name('enroll_student');

	Route::delete('classes/{class}/students/{student}', 'EnrollmentController@destroyStudent')->name('unenroll_student');


	//class user
	Route::resource('users', 'UserController');

	//admin notification
	Route::get('notifications', 'NotificationController@admin_index')->name('notifications.admin_index');

	//activites
	Route::get('activities', 'ActivityController@index')->name('activities.index');
	Route::delete('activities', 'ActivityController@destroy')->name('activities.destroy');

	//print grade
	ROute::get('classes/{class}/tests/{test}/grades/print', 'PDFController@print_test_grade')->name('print-test-grade');

	ROute::get('classes/{class}/grades/print', 'PDFController@print_class_grade')->name('print-class-grade');

});

//main routes for students
Route::get('/home', 'HomeController@home');

Route::prefix('/{class}')->group( function() {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

	//test route
	Route::get('tests', 'StudentTestController@index')->name('student_tests.index');
	Route::get('tests/{test}/take', 'StudentTestController@show')->name('student_tests.take');
	Route::post('tests/{test}/submit', 'StudentTestController@submit_test')->name('student_tests.submit');
	Route::get('tests/{test}/grades/{grade}/assessment', 'StudentTestController@assessment')->name('grade_assessment');
	Route::put('tests/{test}/update-timer', 'StudentTestController@update_timer')->name('update_test_timer');

	//grades route
	Route::get('grades', 'GradeController@index')->name('student_grades.index');
	//student notification
	Route::get('notifications', 'NotificationController@index')->name('notifications.index');

	Route::get('profile', 'ProfileController@student_profile')->name('student_profile');
	
	Route::get('profile/edit', 'ProfileController@student_edit')->middleware('password.confirm');

	Route::get('profile/edit-password', 'ProfileController@student_edit_password')->name('student-edit-password');

		Route::put('{user}/change-password', 'ProfileController@student_change_password')->name('student_update_password');


});


//notification route
Route::get('notifications/read', 'NotificationController@read')->name('read_notification');
Route::get('notifications/destroy', 'NotificationController@destroy')->name('delete_notifications');


//profile
Route::prefix('profile')->group( function() {
	Route::get('', 'ProfileController@profile');
	Route::get('edit', 'ProfileController@edit')->middleware('password.confirm');

	Route::put('{user}', 'ProfileController@update')->name('profile_update')->middleware('password.confirm');

	Route::get('edit-password', 'ProfileController@edit_password')->name('edit-password')->middleware('password.confirm');
	Route::put('{user}/change-password', 'ProfileController@change_password')->name('update_password')->middleware('password.confirm');


});

