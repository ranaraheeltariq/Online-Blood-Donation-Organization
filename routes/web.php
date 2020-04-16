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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Admin Login
// Route::group(['middleware' => ['auth','employee'],'prefix'=>'admin'], function () {
Route::group(['prefix'=>'admin'], function () {
Route::get('/login', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login');
Route::post('/logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');
Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::get('/', 'AdminController@index')->name('admin');
});
Route::group(['middleware' => ['role:Super Admin','auth:admin'],'prefix'=>'admin'], function () {
    Route::get('roles','AdminController@role')->name('roles');
    Route::post('roles','AdminController@storerole')->name('roles');
    Route::get('role/{role}','AdminController@roleshow');
    Route::put('role/{role}','AdminController@roleupdate');
    Route::delete('role/{role}','AdminController@roledestroy');
    Route::get('permissions','AdminController@permission')->name('permissions');
    Route::post('permission','AdminController@storepermission')->name('permission');
    Route::get('permission/{permission}','AdminController@permissionshow');
    Route::put('permission/{permission}','AdminController@permissionupdate');
    Route::delete('permission/{permission}','AdminController@permissiondelete');
});
