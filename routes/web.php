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
Route::get('/',function(){
	return view('welcome');
});
Route::get('welcome','WelcomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('lara_admin')->middleware(['auth','can:isAllowed,"Admin:Author"'])->group(function () {
       Route::get('/','Admin\DashboardController@dashboard')->name('dashboard');
       Route::resource('posts','PostController');
	   Route::resource('users','UserController');
	   Route::resource('profile','UsersProfileController');
	   Route::resource('pages','PageController');
	   Route::resource('categories','CategoryController');
	   Route::resource('roles','RoleController');
});
Route::prefix('vendor_admin')->middleware(['auth','can:isAllowed,"Vendor"'])->group(function () {
       Route::get('/','Admin\DashboardController@vdashboard')->name('vdashboard');
});