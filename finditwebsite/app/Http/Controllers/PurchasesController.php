<?php

namespace App\Http\Controllers;
use View, Validator, Session, Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblEquipmentStatus;
use App\Models\TblEmployees;
use App\Models\TblDepartments;
use App\Models\TblItEquipment;
use App\Models\TblIssuances;
use App\Models\TblSystemUnits;
use App\Models\TblActivityLogs;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblItEquipmentType;
use App\Models\Suppliers;
use App\Models\Purchases;
use App\Models\PurchasedItems;


class PurchasesController extends BaseController
{
    public function showAllStatus(){
      if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
      }

        $data = [];
        $data['status'] = TblEquipmentStatus::get_all_status();
        $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
        $data['suppliers'] = Suppliers::get_suppliers();
        $data['supplier'] = Suppliers::get_suppliers();
        $data['supp'] = Suppliers::get_suppliers();
        $data['brands'] = TblItEquipment::get_brand();
        $data['models'] = TblItEquipment::get_model();
        $data['for_repair'] = TblEquipmentStatus::get_for_repair();
        $data['for_return'] = TblEquipmentStatus::get_for_return();
        $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
        $data['employees'] = TblEmployees::get_employees();
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['issuance'] = TblIssuances::getIssuance();

        $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['sub'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['purchases'] = Purchases::get_purchases();
        $data['purchase'] = Purchases::get_purchases();

        $data['purchasescript'] = Purchases::get_purchases();
        foreach ($data['purchases'] as $purchases) {
          $data['purchases'] [$purchases->purchase_no] = PurchasedItems::get_purchased_Item($purchases->purchase_no);
          //dd($data['purchases']);
        }
        $data['items'] = PurchasedItems::get_all_items();
        $data['items'] = PurchasedItems::get_all_items();

        $data['unit_number'] = PurchasedItems::get_unit_number();
        $data['pc'] = PurchasedItems::get_unit_number();
        $data['pc_component'] = PurchasedItems::get_component();

        // dd($data['pc']);
        return view ('content/purchases' , $data);
    }

    public function fetchBulkPurchases($id = 0){
      $data['purchases'] = PurchasedItems::get_bulk_purchased_items(97);
      echo json_encode($data);
      exit;
    }


        public function viewPurchases(){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
                return \Redirect::to('/loginpage');
          }

            $data = [];
            $data['for_repair'] = TblEquipmentStatus::get_for_repair();
            $data['for_return'] = TblEquipmentStatus::get_for_return();
            $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
            $data['employees'] = TblEmployees::get_employees();
            $data['equipment'] = TblItEquipment::get_all_equipment();
            $data['system_units'] = TblSystemUnits::get_all_system_units();
            // $data['recent_activities'] = TblActivityLogs::get_activities_dashboard();
            $data['issuance'] = TblIssuances::getIssuance();

            // $data['most_issued'] = TblActivityLogs

            $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
            $data['onhand'] = TblItEquipment::countSubtypes();
            $data['onhandAvailable'] = TblItEquipment::countSubtypes();


            return view ('content/viewPurchases' , $data);
        }

        public function returns(){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
                return \Redirect::to('/loginpage');
          }
          $data = [];
          $data['for_return'] = TblEquipmentStatus::get_for_return();
          $data['status'] = TblEquipmentStatus::get_all_status();
          $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
          $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
          $data['suppliers'] = Suppliers::get_suppliers();
          $data['brands'] = TblItEquipment::get_brand();
          $data['models'] = TblItEquipment::get_model();
          $data['for_repair'] = TblEquipmentStatus::get_for_repair();
          $data['for_return'] = TblEquipmentStatus::get_for_return();
          $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
          $data['employees'] = TblEmployees::get_employees();
          $data['equipment'] = TblItEquipment::get_all_equipment();
          $data['system_units'] = TblSystemUnits::get_all_system_units();
          // $data['recent_activities'] = TblActivityLogs::get_activities_dashboard();
          $data['issuance'] = TblIssuances::getIssuance();

          // $data['most_issued'] = TblActivityLogs

          $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
          $data['onhand'] = TblItEquipment::countSubtypes();
          $data['onhandAvailable'] = TblItEquipment::countSubtypes();

          $ctr = 0;
          $data['lowStack'] = collect([]);
            foreach ($data['onhand'] as $onhand) {
              foreach ($data['onhandAvailable'] as $avail) {
                if($onhand->subtype_id==$avail->subtype_id){
                  foreach ($data['subtypesSel'] as $type) {
                    if($onhand->subtype_id==$avail->subtype_id && $avail->subtype_id == $type->id)
                    $data['lowStack'] ->push([
                      'name'=> $type->name,
                      'totalCount'=> $onhand->count,
                      'available'=> $avail->count,
                    ]);
                  }
                }

              }
            }
          $data['lowStackView'] = collect([]);
          foreach ($data['lowStack']  as $lowStack) {
              if($lowStack['totalCount']*.10 >= $lowStack['available']){
                $data['lowStackView'] ->push([
                  'name'=> $lowStack['name'],
                  'available'=> $lowStack['available'],
                ]);
              }
            }

            return view ('content/returns' , $data);
        }

        public function incompleteOrders(){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
                return \Redirect::to('/loginpage');
          }
          $data = [];
          $data['status'] = TblEquipmentStatus::get_all_status();
          $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
          $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
          $data['suppliers'] = Suppliers::get_suppliers();
          $data['supplier'] = Suppliers::get_suppliers();
          $data['brands'] = TblItEquipment::get_brand();
          $data['models'] = TblItEquipment::get_model();
          $data['for_repair'] = TblEquipmentStatus::get_for_repair();
          $data['for_return'] = TblEquipmentStatus::get_for_return();
          $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
          $data['employees'] = TblEmployees::get_employees();
          $data['equipment'] = TblItEquipment::get_all_equipment();
          $data['system_units'] = TblSystemUnits::get_all_system_units();
          // $data['recent_activities'] = TblActivityLogs::get_activities_dashboard();
          $data['issuance'] = TblIssuances::getIssuance();

          // $data['most_issued'] = TblActivityLogs

          $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
          $data['onhand'] = TblItEquipment::countSubtypes();
          $data['onhandAvailable'] = TblItEquipment::countSubtypes();

          $ctr = 0;
          $data['lowStack'] = collect([]);
            foreach ($data['onhand'] as $onhand) {
              foreach ($data['onhandAvailable'] as $avail) {
                if($onhand->subtype_id==$avail->subtype_id){
                  foreach ($data['subtypesSel'] as $type) {
                    if($onhand->subtype_id==$avail->subtype_id && $avail->subtype_id == $type->id)
                    $data['lowStack'] ->push([
                      'name'=> $type->name,
                      'totalCount'=> $onhand->count,
                      'available'=> $avail->count,
                    ]);
                  }
                }

              }
            }
          $data['lowStackView'] = collect([]);
          foreach ($data['lowStack']  as $lowStack) {
              if($lowStack['totalCount']*.10 >= $lowStack['available']){
                $data['lowStackView'] ->push([
                  'name'=> $lowStack['name'],
                  'available'=> $lowStack['available'],
                ]);
              }
            }

            return view ('content/incompleteOrders' , $data);
        }

        public function received(){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
                return \Redirect::to('/loginpage');
          }
            $data = [];
            $data['status'] = TblEquipmentStatus::get_all_status();
            $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
            $data['typesSel'] = TblItEquipmentType::get_all_equipment_type();
            $data['suppliers'] = Suppliers::get_suppliers();
            $data['brands'] = TblItEquipment::get_brand();
            $data['models'] = TblItEquipment::get_model();
            $data['for_repair'] = TblEquipmentStatus::get_for_repair();
            $data['for_return'] = TblEquipmentStatus::get_for_return();
            $data['decommissioned'] = TblEquipmentStatus::get_for_disposal();
            $data['employees'] = TblEmployees::get_employees();
            $data['equipment'] = TblItEquipment::get_all_equipment();
            $data['system_units'] = TblSystemUnits::get_all_system_units();
            $data['issuance'] = TblIssuances::getIssuance();
            $data['supp'] = Suppliers::get_suppliers();

            $data['subtypesSel'] = TblItEquipmentSubtype::get_all_equipment_subtype();
            $data['purchases'] = TblItEquipment::get_received_purchases();
            $data['purchasescript'] = Purchases::get_purchases();
            $data['purchase'] = Purchases::get_purchases();
            // dd($data['purchases']);

            return view ('content/receivedPurchases' , $data);
        }

        public function addpurchase(Request $request){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
          }

          $session=Session::get('loggedIn');
          // dd($request->all());
          $user_id = $session['id'];

          try{
            $data = $request->all();

            $data['user_id'] = $user_id;
            // $data['subtype_id'] = (int)$request->get('subtype_id');
            // dd($data);
            Purchases::add_purchase($data);
            $data['purchase']["brand"];
            $supplier = $data['supplier'];
      			$all_supplier = DB::table('supplier')->where('supplier_name',$supplier)->first();
      			if(!$all_supplier){
              $id=Suppliers::add_supplier($supplier);
      			  $data['supplier_id']=$id;
            }
            if($all_supplier){
              $supp=DB::table('supplier')->select('id')->where('supplier_name',$supplier)->get();
              foreach ($supp as $supp) {
                $data['supplier_id']=(int)$supp->id;
              }

            }

            $ctr = 0;
            $quantity = 0;
            $purchase = "";
            $total = count($data['purchase']["brand"]);
            foreach ($data['purchase']["brand"] as $brand) {
              $data['brand'] = $brand;
              $data['model'] = $data['purchase']["model"][$ctr];
              $data['details'] = $data['purchase']["details"][$ctr];
              $data['subtype_id'] = $data['purchase']["subtype_id"][$ctr];
              $data['qty'] = $data['purchase']["qty"][$ctr];
              if(isset($data['purchase_no'])
              && isset($data['brand'])
              && isset($data['model'])
              && isset($data['details'])
              && isset($data['subtype_id'])
              && isset($data['supplier_id'])
              && isset($data['qty'])){
                  PurchasedItems::add_purchased_Item($data);
              }

                $ctr++;
                  if($ctr==$total){
                    $purchase = $purchase."and ".$data['qty']." ".$data['brand']." ".$data['model'];
                  } else if($ctr > 1){
                    $purchase = $purchase.",".$data['qty']." ".$data['brand']." ".$data['model']." ";
                  } else {
                    $purchase = $purchase.$data['qty']." ".$data['brand']." ".$data['model']." ";
                  }

            }

            $act['activity'] = "purchased"." ".$purchase.".";
            TblActivityLogs::add_log($act);
            return \Redirect::to('/purchases')->with('new purchase added');

          }catch(Exception $e){
            return redirect()->back()
                  ->with('error' , 'Please fill out ALL the fields')
                  ->with('error_info' , $e->getMessage());

          }catch(QueryException $qe){
            return redirect()->back()
                  ->with('error' , 'Database cannot read input value.')
                  ->with('error_info' , $qe->getMessage());

          }
        }

        public function add_pc_purchase(Request $request){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
          }

          $session=Session::get('loggedIn');
          // dd($request->all());
          $user_id = $session['id'];

          try{
            $data = $request->all();
            $unit_number = DB::table('purchased_items')->select('unit_number')->groupBy('unit_number')->orderBy('unit_number', 'desc')->first();
            if ($unit_number->unit_number==null){
              $unit_number->unit_number=1;
            }


            $data['user_id'] = $user_id;
            // // $data['subtype_id'] = (int)$request->get('subtype_id');
            // dd($unit_number->unit_number+1);
            $data['purchase_no'] = Purchases::add_purchase($data);

            $supplier = $data['supplier'];
      			$all_supplier = DB::table('supplier')->where('supplier_name',$supplier)->first();
      			if(!$all_supplier){
              $id=Suppliers::add_supplier($supplier);
      			  $data['supplier_id']=$id;
            }
            if($all_supplier){
              $supp=DB::table('supplier')->select('id')->where('supplier_name',$supplier)->get();
              foreach ($supp as $supp) {
                $data['supplier_id']=(int)$supp->id;
              }

            }

            $ctr = $unit_number->unit_number + 1;
            $quantity = $data['qty'];
            $data['unit_number'] = $ctr;

                foreach ($data['sub'] as $subtype) {
                      $data['subtype_id'] = $subtype;
                      $data['brand'] = $data['component']["$subtype"]["brand"];
                      $data['model'] = $data['component']["$subtype"]["model"];
                      $data['details'] = $data['component']["$subtype"]["details"];
                      $data['is_part'] = 1;

                      if(isset($data['purchase_no'])
                      && isset($data['brand'])
                      && isset($data['model'])
                      && isset($data['details'])
                      && isset($data['subtype_id'])
                      && isset($data['supplier_id'])
                      && isset($data['is_part'])
                      && isset($data['unit_number'])
                      && isset($data['qty'])){
                          PurchasedItems::add_purchased_Item($data);
                      }
                    }



              // $log['data'] = $id;
              // // $log['unit'] = $data['unit_id'];
              // $log['activity'] = "added";
              // TblActivityLogs::add_log($log);
              return \Redirect::to('/purchases')
              ->with('message' , 'New purchase added')
              ->with('data' , "(". $data['qty'] .") " . "unit(s) added to purchases.");

          }catch(Exception $e){
            return redirect()->back()
                  ->with('error' , 'Please fill out ALL the fields')
                  ->with('error_info' , $e->getMessage())
                  ->with('target' , '#singleAdd');

          }catch(QueryException $qe){
            return redirect()->back()
                  ->with('error' , 'Database cannot read input value.')
                  ->with('error_info' , $qe->getMessage())
                  ->with('target' , '#singleAdd');

          }
        }

        public function addToInventory(Request $request){
          if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
          }

            $session=Session::get('loggedIn');
            // dd($request->all());
            $user_id = $session['id'];

            try{
              $data = $request->all();
              Purchases::edit_purchase($data['p_id'],$data['or_no']);
              if(isset($data['subtype_id'])
              && isset($data['brand'])
              && isset($data['model'])
              && isset($data['details'])
              && isset($data['user_id'])
              && isset($data['warranty_start'])
              && isset($data['warranty_end'])
              && isset($data['supplier_id'])
              && isset($data['serial_no'])
              && isset($data['or_no'])
              && isset($data['status_id']) ){
                  $id=TblItEquipment::add_equipment($data);
                  $log['data'] = $id;
                  // $log['unit'] = $data['unit_id'];
                  $log['activity'] = "added";
                  TblActivityLogs::add_log($log);
                  return \Redirect::to('/inventory')->with('equipment added');
                }

              return \Redirect::to('/purchases')->with('item has been added into the inventory');

              }catch(Exception $e){
                return redirect()->back()
                      ->with('error' , 'Please fill out ALL the fields')
                      ->with('error_info' , $e->getMessage())
                      ->with('target' , '#singleAdd');

              }catch(QueryException $qe){
                return redirect()->back()
                      ->with('error' , 'Database cannot read input value.')
                      ->with('error_info' , $qe->getMessage())
                      ->with('target' , '#singleAdd');

              }
            }

            public function deleteItem(Request $request){
              if(Session::get('loggedIn')['user_type']!='admin' &&
              Session::get('loggedIn')['user_type'] != "associate"){
                return redirect()->back()
                ->with('warning' , 'You dont have the right privelege to access this feature');
              }
              try{
                 $data = $request->all();
                PurchasedItems::delete_equipment($data['id']);

                return \Redirect::to('/purchases')->with('message' , 'Item has been removed from the Database');

              }catch(Exception $e){
                return \Redirect::to('/purchases')
                ->with('error' , 'Could not remove equipment from the database')
                ->with('error_info' , $e->getMessage())
                ->with('target' , '#hardDelete');

              }catch(QueryException $qe){
                return \Redirect::to('/purchases')
                ->with('error' , 'Could not remove equipment from the database')
                ->with('error_info' , $qe->getMessage())
                ->with('target' , '#hardDelete');
              }
            }


}
