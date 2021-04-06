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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company/edit/{id}', 'Company\CompanyController@viewEditPage')->name('company.edit');

Route::get('/company/create', 'Company\CompanyController@viewCreateCompany')->name('company.create');
Route::post('/company/create', 'Company\CompanyController@create')->name('company.create');
