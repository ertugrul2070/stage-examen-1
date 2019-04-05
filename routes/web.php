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

Route::get('/websites', 'WebsitesController@getWebsites')->name('websites');
Route::get('/websites/{id}/view', 'WebsitesController@getWebsite');
Route::get('/websites/createPage', 'WebsitesController@storePageWebsites');
Route::post('/websites/store', 'WebsitesController@storeWebsites');
Route::get('/websites/{id}/updatePage', 'WebsitesController@updatePageWebsites');
Route::put('/websites/{id}/update', 'WebsitesController@updateWebsites');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
