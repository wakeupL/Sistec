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

Route::get('/', function ()
{
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/admin/users', function(){
	return view('admin.users.index');
});

Route::get('/admin', function(){
	return view('dashboard');
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('users', 'UsersController');
	Route::get('users/{id}/destroy', [
		'uses'	=> 'UsersController@destroy',
		'as'	=> 'admin.users.destroy'
	]);
	Route::get('users/{id]/password', [
		'uses'	=> 'UsersController@password',
		'as'	=> 'admin.users.password'
	]);

});

