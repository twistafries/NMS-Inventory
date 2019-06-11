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

Route::get('/', [
  'as' => 'loginpage',
  'uses' => function () {
    return \Redirect::to('/loginpage');
}]);

Route::get('/loginpage', function () {
    return view('content/loginpage');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/dashboard', function () {
    return view('content/dashboard');
});

Route::get('/generateReportPage', function () {
    return view('content/generateReport');
});


Route::group(['middleware' => 'preventBackHistory'],function(){
    Auth::routes();
    Route::get('/loginpage', function () {
        return view('content/loginpage');
    });
});
// Route::get('/inventory', 'InventoryController@showAllInventory');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/concerns', 'ForStatusController@showInventoryConcerns');

// Trial Ajax
// Route::get('/ajax', function(){

//     return view('content/trial-ajax');
// });

Route::get('/getUnitForRepair/{id}', 'InventoryController@getUnitForRepair');

Route::get('/fetchID/getPurchases/{id}', 'BulkController@fetchBulkPurchases');
Route::get('/fetchID/{id}', 'BulkController@showFields');


Route::get('/getInfo/{id}', 'InventoryController@showEquipmentInfo');
Route::get('/getFilterOption', 'InventoryController@showFilterOptions');
Route::get('/ajax', 'InventoryController@showAllEquipment');
// Route::get('/getInfo/{1}', 'InventoryController@showEquipmentInfo');

// Route::get('/dashboard', 'DashboardController@showAllStatus');
Route::get('/dashboard', 'DashboardController@showDahsboardDetails');
Route::post('/reInventory', 'DashboardController@filter');
Route::post('/reInventorySummary', 'DashboardController@filter');
Route::get('/purchases', 'PurchasesController@showAllStatus');
Route::get('/receivedPurchases', 'PurchasesController@received');
Route::get('/returns', 'PurchasesController@returns');
Route::get('/incompleteOrders', 'PurchasesController@incompleteOrders');

Route::get('/viewPurchases', 'PurchasesController@viewPurchases');
//generate report
Route::get('/generateReportPage', 'Reports@showAllStatus');
Route::post('/inventoryReports', 'inventoryReports@showInventoryReports');
// Route::get('/itemAvailabilityReport', 'inventoryReports@showAvailable');
// Route::get('/itemRepairReport', 'inventoryReports@showRepair');
// Route::get('/itemReturnReport', 'inventoryReports@showReturn');
// Route::get('/itemDisposalReport', 'inventoryReports@showDisposal');
Route::get('/purchasesAndOrdersReports', 'inventoryReports@showPurchasesAndOrders');
// Route::get('/completedOrdersReport', 'inventoryReports@showCompleteOrders');
// Route::get('/incompleteOrdersReport', 'inventoryReports@showIncompleteOrders');
Route::get('/issuanceReports', 'inventoryReports@showIssuanceReports');
// Route::get('/lateReturnsReport', 'inventoryReports@showLateReport');
// Route::get('/issuancePerComponent', 'inventoryReports@showIssuancePerComponent');
// Route::get('/mostLeastReport', 'inventoryReports@showmostLeastReport');

Route::get('/inventory', 'InventoryController@showAllInventory');
Route::get('/inventoryAll', 'InventoryController@showAllItemsInventory');
Route::get('/systemUnit', 'InventoryController@showSystemUnit');

Route::get('/associates', 'AssociateController@showAllAssociate');
Route::post('/deactivate', 'AssociateController@update_associate_status');
Route::get('/issuableItems', 'ForStatusController@showIssuable');
Route::get('/employees', 'ForStatusController@showEmployees');
Route::post('/editEmployee', 'ForStatusController@editEmployee');
Route::post('/changeStatusEmployee', 'ForStatusController@changeStatus');
Route::post('/changeStatus', 'ForStatusController@editEmployee');

Route::get('/repair', 'ForStatusController@showRepairItems');
Route::get('/repairSummary', 'ForStatusController@showRepairItemsSummary');
Route::get('/return', 'ForStatusController@showReturnItems');
Route::get('/decommissioned', 'ForStatusController@showDecommissionedItems');
// Route::get('/purchasenumber', 'ForStatusController@showPurchases');
// Route::get('/ornumber', 'ForStatusController@showOR');
// Route::get('/purchaseHistory', 'ForStatusController@showPurchaseHistory');

Route::get('/issue', 'IssuanceController@employeeIssuance');
Route::get('/issuance', 'IssuanceController@showAllIssuance');

Route::post('/addEquipment', 'InventoryController@addEquipment');
Route::post('/addpurchase', 'PurchasesController@addpurchase');
Route::post('/addToInventory', 'PurchasesController@addToInventory');
Route::post('/addIssuance', 'IssuanceController@addIssuance');
Route::post('/addSystemUnit', 'InventoryController@addSystemUnit');
Route::post('/addEmployee', 'ForStatusController@addEmployee');
Route::post('/removeEmployee', 'ForStatusController@removeEmployee');
Route::post('/addUsers', 'AssociateController@addUsers');
Route::post('/removeUser', 'AssociateController@removeUser');

Route::post('/editEquipment', 'InventoryController@editEquipment');
Route::post('/add-to-concerns-equipment', 'InventoryConcernsController@markForConcernsEquipment');
Route::post('/add-to-concerns-system-unit', 'InventoryConcernsController@markForConcernsSystemUnit');
// Route::post('/editStatus', 'InventoryController@changeStatus');
// Route::post('/change-status', 'InventoryController@changeStatus');
Route::post('/editIssuance', 'InventoryController@editEquipment');
Route::post('/editAssociates', 'AssociateController@editAssociates');


// Route::get('/bulk-add', 'BulkController@showFields');
Route::get('/bulkadd', 'BulkController@showFields');
// Route::get('/bulkadd/{id}', 'BulkController@showFields');
// Route::get('/temp-bulk-add', 'BulkController@showFields');
Route::post('/temp-bulk-add-post', 'BulkController@bulkAddInventory');

Route::post('/hardDeleteEquipment', 'InventoryController@hardDeleteEquipment');
Route::post('/softDeleteEquipment', 'InventoryController@softDeleteEquipment');

/*
|--------------------------------------------------------------------------
| System Unit Routes
|--------------------------------------------------------------------------
|
*/

// deprecated, from modal
Route::post('/buildUnit', 'InventoryController@buildUnit');

// newer, from page
Route::get('/buildpc', 'PCBuildController@buildPC');
Route::post('/buildFromParts', 'PCBuildController@buildFromParts');

//bulk add purchased unit
Route::post('/bulkUnitAdd', 'PCBuildController@bulkAddUnits');
Route::post('/tempBulkPC', 'PCBuildController@insertBulkPC');
//edit PC

/*------------------------------------------------------------------------*/

Route::post('/template', 'InventoryController@addEquipment');

Route::get('/activitylogs', 'ActivityLogsController@getActivityLogs');
