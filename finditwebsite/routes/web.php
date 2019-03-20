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


Route::get('/inventory', 'InventoryController@showAllInventory'); 
Route::get('/inventory-temp-add', 'InventoryController@showInputValues'); 
Route::post('/addEquipment', 'InventoryController@addEquipment'); 
// Route::get('/inventory', 'InventoryController@showAllInventory');
// Route::get('/inventory3', 'InventoryController@getTableColumns');
