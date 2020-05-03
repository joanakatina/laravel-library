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

Route::view('/', 'pages.home');      //naršyklės lange įvedus svetainės adresą (pvz., http://localhost:8000/) bus matomas vaizdas home, esantis kataloge pages
Route::view('/home', 'pages.home');      //naršyklės lange įvedus svetainės adresą + '/home' (pvz., http://localhost:8000/home) bus matomas vaizdas home, esantis kataloge pages
Route::view('/about', 'pages.about');     //naršyklės lange įvedus svetainės adresą + '/about' (pvz., http://localhost:8000/about) bus matomas vaizdas about, esantis kataloge pages
Route::view('/contacts','pages.contacts');

Route::get('/authors', 'AuthorsController');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['role:admin|librarian']], function () {
    Route::view('/admin', 'admin.dashboard');

    Route::get('/admin/authors', 'Admin\AuthorsController@index');
    Route::get('/admin/authors/create', 'Admin\AuthorsController@create');
    Route::post('/admin/authors', 'Admin\AuthorsController@store');
    Route::get('/admin/authors/{id}', 'Admin\AuthorsController@show');
    Route::get('/admin/authors/{id}/edit', 'Admin\AuthorsController@edit');
    Route::patch('/admin/authors/{id}', 'Admin\AuthorsController@update');
    Route::delete('/admin/authors/{id}', 'Admin\AuthorsController@destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/users', 'Admin\UsersController@index');
    Route::get('/admin/users/create', 'Admin\UsersController@create');
    Route::post('/admin/users', 'Admin\UsersController@store');
    Route::get('/admin/users/{id}', 'Admin\UsersController@show');
    Route::get('/admin/users/{id}/edit', 'Admin\UsersController@edit');
    Route::patch('/admin/users/{id}', 'Admin\UsersController@update');
    Route::delete('/admin/users/{id}', 'Admin\UsersController@destroy');

    Route::get('/admin/roles', 'Admin\RolesController@index');
    Route::get('/admin/roles/create', 'Admin\RolesController@create');
    Route::post('/admin/roles', 'Admin\RolesController@store');
    Route::get('/admin/roles/{id}', 'Admin\RolesController@show');
    Route::get('/admin/roles/{id}/edit', 'Admin\RolesController@edit');
    Route::patch('/admin/roles/{id}', 'Admin\RolesController@update');
    Route::delete('/admin/roles/{id}', 'Admin\RolesController@destroy');

    Route::get('/admin/permissions', 'Admin\PermissionsController@index');
    Route::get('/admin/permissions/create', 'Admin\PermissionsController@create');
    Route::post('/admin/permissions', 'Admin\PermissionsController@store');
    Route::get('/admin/permissions/{id}', 'Admin\PermissionsController@show');
    Route::get('/admin/permissions/{id}/edit', 'Admin\PermissionsController@edit');
    Route::patch('/admin/permissions/{id}', 'Admin\PermissionsController@update');
    Route::delete('/admin/permissions/{id}', 'Admin\PermissionsController@destroy');
});
