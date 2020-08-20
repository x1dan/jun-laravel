<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->namespace('Api')->middleware('api')->group(function() {

	Route::get('/me', 'UserController@me');
	Route::post('/login', 'UserController@login');
	Route::post('/register', 'UserController@register');
	Route::post('/refresh', 'UserController@refresh');
	Route::post('/logout', 'UserController@logout');

});
Route::namespace('Api')->middleware('jwt.auth')->group(function () {

	Route::prefix('employees')->group(function() {
		Route::get('/', 'EmployeesController@index');
		Route::post('/', 'EmployeesController@create');
		Route::get('/{id}', 'EmployeesController@view');
		Route::delete('/{id}', 'EmployeesController@delete');
		Route::post('/{id}/edit', 'EmployeesController@edit');
	});

	Route::prefix('companies')->group(function() {

		Route::get('/', 'CompaniesController@index');
		Route::post('/', 'CompaniesController@create');
		Route::get('/{id}', 'CompaniesController@view');
		Route::delete('/{id}', 'CompaniesController@delete');
		Route::post('/{id}/edit', 'CompaniesController@edit');
	});

});
