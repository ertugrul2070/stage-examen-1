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

/**
 * All routes for the websites crud system
 */
Route::get('/websites', 'WebsitesController@getWebsites')->name('websites');
Route::get('/websites/{id}/view', 'WebsitesController@getWebsite');
Route::get('/websites/createPage', 'WebsitesController@storePageWebsites');
Route::post('/websites/store', 'WebsitesController@storeWebsites');
Route::get('/websites/{id}/updatePage', 'WebsitesController@updatePageWebsites');
Route::put('/websites/{id}/update', 'WebsitesController@updateWebsites');
Route::get('/websites/{id}/delete', 'WebsitesController@deleteWebsites');
/**
 * End of all website routes
 */

/**
 * All routes for the zones crud system
 */
Route::get('/zones', 'ZonesController@getZones')->name('zones');
Route::get('/zones/{id}/view', 'ZonesController@getZone');
Route::get('/zones/createPage', 'ZonesController@storePageZones');
Route::post('/zones/store', 'ZonesController@storeZones');
Route::get('/zones/{id}/updatePage', 'ZonesController@updatePageZones');
Route::put('/zones/{id}/update', 'ZonesController@updateZones');
Route::get('/zones/{id}/delete', 'ZonesController@deleteZones');
/**
 * End of all zones routes
 */


/**
 * All routes for the vasttags crud system
 */
Route::get('/vasttags', 'VasttagsController@getvasttags')->name('vasttags');
Route::get('/vasttags/{id}/view', 'VasttagsController@getvasttag');
Route::get('/vasttags/createPage', 'VasttagsController@storePagevasttags');
Route::post('/vasttags/store', 'VasttagsController@storevasttags');
Route::get('/vasttags/{id}/updatePage', 'VasttagsController@updatePagevasttags');
Route::put('/vasttags/{id}/update', 'VasttagsController@updatevasttags');
Route::get('/vasttags/{id}/delete', 'VasttagsController@deletevasttags');
/**
 * End of all vasttags routes
 */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
