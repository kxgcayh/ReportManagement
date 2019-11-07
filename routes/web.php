<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Route::get('/', function () {
|    return view('welcome');
| });
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('projects', 'ProjectController');
    Route::resource('brands', 'BrandController');

    Route::resource('productions', 'ProductionController')->except([
        'show'
    ]);

    Route::resource('/locations', 'LocationController')->except([
        'create', 'show'
    ]);

    Route::resource('/types', 'TypeController')->except([
        'create', 'show'
    ]);

    Route::resource('/categories', 'CategoryController')->except([
        'create', 'show'
    ]);

    Route::resource('/departements', 'DepartementController')->except([
        'show'
    ]);
});
