<?php

use Illuminate\Http\Request;

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

Route::get('/employees', 'EmployeesController@getEmployees');

Route::post('/employee', [
    'uses' => 'EmployeesController@postEmployee'
]);

Route::get('/employee/{id}', [
    'uses' => 'EmployeesController@getEmployee'
]);

Route::put('/employee/{id}', [
    'uses' => 'EmployeesController@putEmployee'
]);

Route::delete('/employee/{id}', [
    'uses' => 'EmployeesController@deleteEmployee'
]);