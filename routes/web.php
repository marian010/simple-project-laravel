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

Auth::routes([
    'register' => false
]);
Route::middleware(['auth'])->group(function () {
Route::get('/home',                     'HomeController@index')->name('home');

Route::get('/employe',                  'Employee\EmployeeController@index')->name('employee.index');
Route::get('/employe/create',           'Employee\EmployeeController@create')->name('employee.create');
Route::post('/employe/create',          'Employee\EmployeeController@store');
Route::delete('/employe/{id}',          'Employee\EmployeeController@destroy');
Route::get('/employe/edit/{id}',        'Employee\EmployeeController@edit')->name('employee.edit');
Route::post('/employe/edit/{id}',       'Employee\EmployeeController@update');

Route::delete('/company/destroy/{id}',  'Company\CompanyController@destroy')->name('company.destroy');
Route::get('/company/list',             'Company\CompanyController@viewCompanies')->name('company.list');

Route::get('/company/edit/{id}',        'Company\CompanyController@viewEditPage')->name('company.edit');
Route::post('/company/edit/{id}',       'Company\CompanyController@update')->name('company.edit');

Route::get('/company/create',           'Company\CompanyController@viewCreateCompany')->name('company.create');
Route::post('/company/create',          'Company\CompanyController@create')->name('company.create');
});
