<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblSystemUnits;
use App\Models\TblActivityLogs;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblItEquipmentType;
use App\Models\TblEquipmentStatus;
use App\Models\PurchasedItems;
use App\Models\Purchases;
use App\Models\Suppliers;
use Session, Auth;

class BulkController extends BaseController
{
    public function showFields($id = 0){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
        $data = [];
              $data['peripherals'] = TblItEquipment::get_computer_peripherals();

        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['software'] = TblItEquipment::get_software();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['units'] = TblSystemUnits::get_all_system_units();
        $data['systemunits'] = TblSystemUnits::get_all_system_units();
        $data['units_system'] = TblSystemUnits::get_all_system_units();
        $data['all_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['component_subtypes'] = TblItEquipmentSubtype::get_component_subtype();
        $data['equipment_status'] = TblEquipmentStatus::get_all_status();
        $data['suppliers'] = Suppliers::get_suppliers();
        if($id != 0){
            $data['item_id'] = $id;
        }else{
            $data['item_id'] = 0;
        }

        return view ('content/bulkadd' , $data);
    }

   public function bulkAddInventory(Request $request){
       if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }
      
    //   Purchases::edit_purchase($data['p_id'],$data['or_no']);
      //   Purchases::edit_purchase($data['p_id'],$data['or_no']);
      try{
        $item_id = $request->input('bulk.*')[0][0];
        $p_id = PurchasedItems::get_bulk_purchased_items($item_id)[0]->p_id;
        
        $session=Session::get('loggedIn');
        $user_id = $session['id'];
        // dd($user_id);
        $show = $request->all();
        // dd($show);
        $data = $request->input('bulk.*');
        $data['inventory'] = collect([]);
        $serial_no = $request->get('bulk')['serial_no'];
        $subtype_id = $request->get('bulk')['subtype_id'];
        $status_id = $request->get('bulk')['status_id'];
        // $unit_id = $request->get('bulk')['unit_id'];
        $brands = $request->get('bulk')['brand'];
        $model = $request->get('bulk')['model'];
        $details = $request->get('bulk')['details'];
        $imei_or_macaddress = $request->get('bulk')['imei_or_macaddress'];
        $or_no = $request->get('bulk')['or_no'];
        $supplier_id = $request->get('bulk')['supplier_id'];
        $warranty_start = $request->get('bulk')['warranty_start'];
        $warranty_end = $request->get('bulk')['warranty_end'];

        $count = 0;
        foreach($brands as $brand){
            $data['inventory'] -> push([
                'brand' => $brand,
                'model' => $model[$count],
                'serial_no' => $serial_no[$count],
                'subtype_id' => $subtype_id[$count],
                'status_id' => $status_id[$count],
                'unit_id' => "NULL",
                'details' => $details[$count],
                'imei_or_macaddress' => $imei_or_macaddress[$count],
                'or_no' => $or_no[$count],
                'supplier_id' => $supplier_id[$count],
                'warranty_start' => $warranty_start[$count],
                'warranty_end' => $warranty_end[$count],
                'user_id' => $user_id
            ]);

            $count++;
        }
        
        //counter for qty added
        $ctr = 0;

        foreach($data['inventory'] as $inventory){
            TblItEquipment::add_equipment($inventory);
            $ctr++;
        }
        $purchasedItem = PurchasedItems::find($item_id);
        $purchasedItem->qty_added = $ctr;
        $purchasedItem->save();

        if(is_null(Purchases::find($p_id)->or_no)){
            Purchases::edit_purchase($p_id , $or_no[0]);
        }

        return \Redirect::to('/inventoryAll')
        ->with('message' , $count  . ' equipment has been added');

    }catch(Exception $e){
        return redirect()->back()
              ->with('error' , 'Database cannot read input value.')
              ->with('error_info' , $qe->getMessage())
              ->with('target' , '#singleAdd');
    }catch(QueryException $qe){
        return redirect()->back()
              ->with('error' , 'Database cannot read input value.')
              ->with('error_info' , $qe->getMessage())
              ->with('target' , '#singleAdd');
        }   
    }

    
    public function fetchBulkPurchases($id = 0){
        $data['purchases'] = PurchasedItems::get_bulk_purchased_items($id);
        echo json_encode($data);
        exit;
    }
}
