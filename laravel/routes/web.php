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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@home')->name('home');

// jacket CRUD page

Route::get('/jackets', 'JacketsController@index')->name('jackets');
Route::get('/jackets/create', 'JacketsController@create')->name('createjackets');
Route::post('/jackets/create', 'JacketsController@store')->name('createjackets');
Route::get('/jackets/{id}', 'JacketsController@show')->name('showjackets');
Route::get('/jackets/{id}/edit', 'JacketsController@edit')->name('editjacket');
Route::post('/jackets/{id}/edit', 'JacketsController@update')->name('editjacket');
Route::get('/jackets/delete/{id}', 'JacketsController@destroy')->name('deletejacket');

// sneaker CRUD page

Route::get('/sneakers', 'SneakersController@index')->name('sneakers');
Route::get('/sneakers/create', 'SneakersController@create')->name('createsneakers');
Route::post('/sneakers/create', 'SneakersController@store')->name('createsneakers');
Route::get('/sneakers/{id}', 'SneakersController@show')->name('showsneakers');
Route::get('/sneakers/{id}/edit', 'SneakersController@edit')->name('editsneaker');
Route::post('/sneakers/{id}/edit', 'SneakersController@update')->name('editsneaker');
Route::get('/sneakers/delete/{id}', 'SneakersController@destroy')->name('deletesneaker');