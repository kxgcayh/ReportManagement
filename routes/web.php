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
    Route::get('/brands/restore/{id_brand}', 'BrandController@restore');
    Route::get('/brands/forceDelete/{id_brand}', 'BrandController@forceDelete');

    // Machine
    Route::resource('machines', 'MachineController')->except(['show', 'create']);
    Route::get('/machines/restore/{id_machine}', 'MachineController@restore');
    Route::get('/machines/forceDelete/{id_machine}', 'MachineController@forceDelete');

    // Product
    Route::resource('products', 'ProductController')->except(['show', 'create']);
    Route::get('/products/restore/{id_product}', 'ProductController@restore');
    Route::get('/products/forceDelete/{id_product}', 'ProductController@forceDelete');

    // Production
    Route::resource('productions', 'ProductionController')->except(['show', 'create']);
    Route::get('/productions/restore/{id_product}', 'ProductionController@restore');
    Route::get('/productions/forceDelete/{id_product}', 'ProductionController@forceDelete');

    // Location
    Route::resource('locations', 'LocationController')->except([
        'create', 'show'
    ]);
    Route::get('/locations/restore/{id_location}', 'LocationController@restore');
    Route::get('/locations/forceDelete/{id_location}', 'LocationController@forceDelete');

    // Type
    Route::resource('types', 'TypeController')->except([
        'create', 'show'
    ]);
    Route::get('/types/restore/{id_type}', 'TypeController@restore');
    Route::get('/types/forceDelete/{id_type}', 'TypeController@forceDelete');

    // Categories
    Route::resource('categories', 'CategoryController')->except([
        'create', 'show'
    ]);
    Route::get('/categories/restore/{id_category}', 'CategoryController@restore');
    Route::get('/categories/forceDelete/{id_category}', 'CategoryController@forceDelete');

    // Departement
    Route::resource('departements', 'DepartementController')->except([
        'show', 'create'
    ]);
    Route::get('/departements/restore/{id_departement}', 'DepartementController@restore');
    Route::get('/departements/forceDelete/{id_departement}', 'DepartementController@forceDelete');

    // Project
    Route::resource('projects', 'ProjectController')->except(['create']);
    // Report
    Route::resource('reports', 'ReportController')->except(['show']);
});
