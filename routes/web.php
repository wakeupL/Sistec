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
	Route::resource('countries', 'CountriesController');

	Route::get('countries/{id}/destroy',[
		'uses'	=> 'CountriesController@destroy',
		'as'	=> 'admin.countries.destroy'
	]);

	Route::resource('states', 'StatesController');

	Route::get('states/{id}/destroy',[
		'uses'	=> 'StatesController@destroy',
		'as'	=> 'admin.states.destroy'
	]);

	Route::resource('distrits', 'DistritsController');

	Route::get('distrits/{id}/destroy',[
		'uses'	=> 'DistritsController@destroy',
		'as'	=> 'admin.distrits.destroy'
	]);

	Route::resource('zones', 'ZonesController');

	Route::get('zones/{id}/destroy',[
		'uses'	=> 'ZonesController@destroy',
		'as'	=> 'admin.zones.destroy'
	]);

	Route::resource('companies', 'CompaniesController');

	Route::get('companies/{id}/destroy',[
		'uses'	=> 'CompaniesController@destroy',
		'as'	=> 'admin.companies.destroy'
	]);

	Route::resource('departments', 'DepartmentsController');

	Route::get('departments/{id}/destroy',[
		'uses'	=> 'DepartmentsController@destroy',
		'as'	=> 'admin.departments.destroy'
	]);

	Route::resource('statuses', 'StatusesController');

	Route::get('statuses/{id}/destroy',[
		'uses'	=> 'StatusesControllerController@destroy',
		'as'	=> 'admin.statuses.destroy'
	]);
	
});

