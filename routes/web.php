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
    return view('pages.home');      //naršyklės lange įvedus svetainės adresą (pvz., http://localhost:8000/) bus matomas vaizdas home, esantis kataloge pages
});
Route::get('/home', function () {
    return view('pages.home');      //naršyklės lange įvedus svetainės adresą + '/home' (pvz., http://localhost:8000/home) bus matomas vaizdas home, esantis kataloge pages
});
Route::get('/about', function () {
    return view('pages.about');     //naršyklės lange įvedus svetainės adresą + '/about' (pvz., http://localhost:8000/about) bus matomas vaizdas about, esantis kataloge pages
});
Route::get('/contacts', function () {
    return view('pages.contacts');
});
Route::get('/admin', function () {
    return view('admin.dashboard'); //naršyklės lange įvedus svetainės adresą + '/admin' (pvz., http://localhost:8000/admin) bus matomas vaizdas dashboard, esantis kataloge admin
});
/*Route::get('/admin/authors', function () {
    return view('admin.authors.index');
});*/
Route::get('/authors', 'AuthorsController');
Route::get('/admin/authors', 'Admin\AuthorsController@index');
Route::get('/admin/authors/create', 'Admin\AuthorsController@create');
Route::post('/admin/authors', 'Admin\AuthorsController@store');
Route::get('/admin/authors/{id}', 'Admin\AuthorsController@show');
Route::get('/admin/authors/{id}/edit', 'Admin\AuthorsController@edit');
Route::patch('/admin/authors/{id}', 'Admin\AuthorsController@update');
Route::delete('/admin/authors/{id}', 'Admin\AuthorsController@destroy');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
