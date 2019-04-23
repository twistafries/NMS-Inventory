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
    return \Redirect::to('/loginpage');
});

Route::get('/loginpage', function () {
    return view('content/loginpage');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/dashboard', function () {
    return view('content/dashboard');
});

// Route::get('/inventory', 'InventoryController@showAllInventory');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/concerns', 'ForStatusController@showInventoryConcerns');

Route::get('/dashboard', 'ForStatusController@showAllStatus');
Route::get('/inventory', 'InventoryController@showAllInventory');
Route::get('/associates', 'AssociateController@showAllAssociate');
Route::post('/deactivate', 'AssociateController@update_associate_status');
Route::get('/issuableItems', 'ForStatusController@showIssuable');
Route::get('/employees', 'ForStatusController@showEmployees');
Route::post('/editEmployee', 'ForStatusController@editEmployee');
Route::post('/changeStatus', 'ForStatusController@editEmployee');

Route::post('/addEquipment', 'InventoryController@addEquipment');
Route::post('/addIssuance', 'IssuanceController@addIssuance');
Route::post('/addSystemUnit', 'InventoryController@addSystemUnit');
Route::post('/addEmployee', 'ForStatusController@addEmployee');
Route::post('/editEquipment', 'InventoryController@editEquipment');

Route::get('/bulk-add', 'BulkController@showFields');
Route::get('/temp-bulk-add', 'BulkController@showFields');
Route::post('/temp-bulk-add-post', 'BulkController@bulkAddInventory');

Route::post('/hardDeleteEquipment', 'InventoryController@hardDeleteEquipment');
Route::post('/softDeleteEquipment', 'InventoryController@softDeleteEquipment');

Route::post('/template', 'InventoryController@addEquipment');


Route::get('/issuance', 'IssuanceController@showAllIssuance');
