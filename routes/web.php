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


use Illuminate\Http\Request;
use App\{Employee,Department};
use Illuminate\Support\Facades\DB;

/**
 * Сетка
 */
Route::get('/', ['uses' => 'SiteController@index']);


/**
 * Вывести список сотрудников
 */
Route::get('/employee', ['uses' => 'EmployeeController@index']);


/**
 * Добавить нового сотрудника
 */
Route::get('/employee/create',  ['uses' => 'EmployeeController@create']);


/**
 * Сохранить
 */
Route::post('/employee', ['uses' => 'EmployeeController@store']);


/**
 * Редактировать сотрудника
 */
Route::get('/employee/{employee}/edit',  ['uses' => 'EmployeeController@edit']);

/**
 * Сохранить отредактированного сотрудника
 */
Route::post('/employee/{employee}/edit',  ['uses' => 'EmployeeController@update']);

/**
 * Удалить сотрудника
 */
Route::delete('/employee/{employee}',  ['uses' => 'EmployeeController@destroy']);



/**
 * Вывести список отделов
 */
Route::get('/department', ['uses' => 'DepartmentController@index']);


/**
 * Удалить отдел
 */
Route::delete('/department/{department}', ['uses' => 'DepartmentController@destroy']);



/**
 * Добавить новоый отдел
 */
Route::get('/department/create',  ['uses' => 'DepartmentController@create']);




/**
 * Сохранить
 */
Route::post('/department', ['uses' => 'DepartmentController@store']);





/**
 * Редактировать отдел
 */
Route::get('/department/{department}/edit', ['uses' => 'DepartmentController@edit']);


Route::post('/department/{department}/edit', ['uses' => 'DepartmentController@update']);
