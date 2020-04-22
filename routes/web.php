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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'WizardController@index');
Route::post('/step1', 'WizardController@step1');
Route::post('/step2', 'WizardController@step2');
Route::get('/uuid', 'WizardController@step2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
