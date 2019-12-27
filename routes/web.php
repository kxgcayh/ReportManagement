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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');

// Authenticated User Access
Route::group(['middleware' => ['auth']], function () {
    // Role
    Route::resource('roles', 'RoleController');
    // User
    Route::resource('users', 'UserController');
    // Brand
    Route::resource('brands', 'BrandController')->except(['show', 'create']);
    // Machine
    Route::resource('machines', 'MachineController')->except(['show', 'create']);
    // Product
    Route::resource('products', 'ProductController')->except(['show', 'create']);
    // Production
    Route::resource('productions', 'ProductionController')->except(['show', 'create']);
    // Location
    Route::resource('locations', 'LocationController')->except([
        'create', 'show'
    ]);
    // Type
    Route::resource('types', 'TypeController')->except([
        'create', 'show'
    ]);
    // Categories
    Route::resource('categories', 'CategoryController')->except([
        'create', 'show'
    ]);
    // Departement
    Route::resource('departements', 'DepartementController')->except([
        'show', 'create'
    ]);
    // Project
    Route::resource('projects', 'ProjectController')->except(['create']);
    // Report
    Route::resource('reports', 'ReportController')->except(['show']);
});
