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
    return \Redirect::to('/login');
});

Route::get('/login', function () {
    return view('content/login');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/dashboard', function () {
    return view('content/dashboard');
});

// Route::get('/inventory', 'InventoryController@showAllInventory');


Route::get('/dashboard', 'ForStatusController@showAllStatus');
Route::get('/inventory', 'InventoryController@showAllInventory');
Route::get('/associates', 'AssociateController@showAllAssociate');
Route::get('/bulk-add', 'InventoryController@bulkAdd');

Route::post('/inventory/add', 'InventoryController@addEquipment');

 Route::get('/inventory-temp', 'InventoryController@showAllInventory');
 Route::get('/inventory3', 'InventoryController@getTableColumns');
