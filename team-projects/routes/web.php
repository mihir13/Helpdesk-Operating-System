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

Route::get('/pages/EditedProblemForm/{id}', 'EditProblemFormController@index')->name('EnterEditProblemForm')->middleware('auth');

Route::get('/pages/splash', 'ExitNewFormController@index')->name('ExitNewProblemForm')->middleware('auth');

Route::get('/pages/ProblemForm', 'NewFormController@index')->name('ProblemForm')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
