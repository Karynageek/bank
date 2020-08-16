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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Deposit:
Route::get('/deposit/create', 'DepositController@create')->name('deposit-create');
Route::post('/deposit/create', 'DepositController@store')->name('form-deposit-create');
Route::get('/deposit/view', 'DepositController@show')->name('deposit-view');

// Manage users:    
Route::get('admin/user/create', 'AdminUserController@create')->name('admin-user-create');
Route::post('admin/user/create', 'AdminUserController@store')->name('form-admin-user-create');
Route::get('admin/user/view', 'AdminUserController@show')->name('admin-user-view');
Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
Route::post('admin/user/edit/{id}', 'AdminDepositController@update')->name('form-admin-user-edit');
Route::get('admin/user/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');

// Manage deposit: 
Route::get('admin/deposit/view', 'AdminDepositController@show')->name('admin-deposit-view');
Route::get('admin/deposit/edit/{id}', 'AdminDepositController@edit')->name('admin-deposit-edit');
Route::post('admin/deposit/edit/{id}', 'AdminDepositController@update')->name('form-admin-deposit-edit');
Route::get('admin/deposit/delete/{id}', 'AdminDepositController@destroy')->name('admin-deposit-delete');

Route::get('/admin','AdminController@index');
Route::get('/admin/login',['as' => 'admin.login','uses' => 'AuthAdmin\LoginController@showLoginForm']);
Route::post('/admin/login',['uses' => 'AuthAdmin\LoginController@login']);
Route::get('/admin/logout',['as' => 'admin.logout','uses' => 'AuthAdmin\LoginController@logout']);

//Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
 //тут твои пути остальные