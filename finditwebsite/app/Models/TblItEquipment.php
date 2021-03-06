<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

use DB;

class TblItEquipment extends Model
{
    protected $table = 'it_equipment';
    public $timestamps = false;

    public static function get_all_equipment($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%Y-%m-%d') as added_at"))
        -> orderBy('it_equipment.created_at' , 'desc')
        -> get();


        return $query;
    }

    public static function get_all_available($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%Y-%m-%d') as added_at"))
        -> orderBy('it_equipment.created_at' , 'desc')
        -> where('it_equipment.status_id', '=', '1')
        -> where('it_equipment.updated_at', '=', null)
        -> get();


        return $query;
    }

    public static function get_item_additions($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> select('it_equipment.*', 'it_equipment.id as name_component', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype','it_equipment_type.name as type', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%Y-%m-%d') as added_at"))
        -> whereBetween('it_equipment.created_at', [$params['start'], $params['end']])
        -> orderBy('it_equipment.created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_incomplete_orders($params = null){
        $query = TblItEquipment::leftjoin('equipment_status', 'equipment_status.id', '=', 'status_id')
        ->leftjoin('supplier', 'supplier.id', '=', 'supplier_id')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        ->select('it_equipment_type.name as type', 'it_equipment_subtype.name as subtype', 'it_equipment.id as eqId', 'brand', 'model', 'it_equipment.created_at', 'or_no', 'supplier.supplier_name as supplier')
        ->where('status_id', '=', 6)
        ->whereBetween('it_equipment.created_at', [$params['start'], $params['end']])
        ->orderBy('it_equipment.created_at' , 'desc')
        ->get();
        return $query;
    }


    public static function get_equipment_info($id){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> where('it_equipment.id', '=' , $id)
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%Y-%m-%d') as added_at"))
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_IT_equipment($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%Y-%m-%d') as added_at"))
        -> where('it_equipment_subtype.type_id' , '!=' , '4')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_all_brands(){
        $query = \DB::table('it_equipment')
        -> select('brand')
        -> groupBy('brand')
        -> orderBy('id')
        -> get();
        return $query;
    }

    public static function get_qty($subtype, $status = null){
      	if($status!=null) {
        $query = \DB::table('it_equipment')
        -> where('it_equipment.subtype_id' , '=' , $subtype)
        -> where('it_equipment.status_id' , '=' , $status)
        -> get();
      } else {
        $query = \DB::table('it_equipment')
        -> where('it_equipment.subtype_id' , '=' , $subtype)
        -> get();
      }
        return $query;
    }

    public static function get_all_hardware($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_subtype.id as subtype_id','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '1')
        -> orwhere('it_equipment_subtype.type_id' , '=' , '2')
        -> orwhere('it_equipment_subtype.type_id' , '=' , '3')
        -> get();
        return $query;
    }

    public static function get_all_software($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_subtype.id as subtype_id','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '4')
        -> get();
        return $query;
    }

    public static function get_computer_peripherals($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '2')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_component($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '1')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_all_parts($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'it_equipment_subtype.type_id as type_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment.unit_id' , '!=' , null)
        -> orderBy('subtype_name' , 'asc')
        -> get();
        return $query;
    }

    public static function get_all_pc_parts($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'it_equipment_subtype.type_id as type_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment.unit_id' , '=' , $params['unit_id'])
        -> orderBy('subtype_name' , 'asc')
        -> get();
        return $query;
    }


    public static function get_mobile_devices($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }
    public static function get_software($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'users.fname as firstname', 'users.lname as lastname', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> where('it_equipment_subtype.type_id' , '=' , '4')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }


    public static function get_brand($params = null){
        $query = \DB::table('it_equipment')
        -> select('it_equipment.brand as brand')
        -> groupBy('brand')
        -> get();
        return $query;
    }

    public static function get_model($params = null){
        $query = \DB::table('it_equipment')
        -> select('it_equipment.model as model')
        -> groupBy('model')
        -> get();
        return $query;
    }

    public static function get_status($id){
      $query = \DB::table('it_equipment')
      -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
      ->select('equipment_status.name as status')
      ->where('it_equipment.id', '=', $id)
      ->get();
      return $query;
    }

    public static function countSubtypes(){
      $query = \DB::table('it_equipment as i')
      ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'i.subtype_id')
      ->leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
      ->select( "i.subtype_id", DB::raw("COUNT(i.subtype_id) as count"))
      ->where('status_id', '=', '1')
      ->orwhere('status_id', '=', '2')
      ->orwhere('status_id', '=', '3')
      ->orwhere('status_id', '=', '4')
      ->groupBy('i.subtype_id')
      ->get();
      return $query;
    }

    public static function countAvailable(){
      $query = \DB::table('it_equipment as i')
      ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'i.subtype_id')
      ->leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
      ->select( "i.subtype_id", DB::raw("COUNT(i.subtype_id) as count"))
      ->where('status_id', '=', '1')
      ->groupBy('i.subtype_id')
      ->get();
      return $query;
    }

    public static function countByStatus($status,$id){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> where('equipment_status.name', '=', $status)
        -> where('it_equipment_type.id', '=', $id)
        -> get();
        return $query;
    }

    public static function countByStatusSoftware($status){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> where('equipment_status.name', '=', $status)
        -> where('it_equipment_type.id', '=', '4')
        -> get();
        return $query;
    }

    public static function countByStatusHardware($status){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> where('equipment_status.name', '=', $status)
        -> where('it_equipment_type.id', '!=', '4')
        -> get();
        return $query;
    }
    public static function countByStatusSubtype($status , $subtype){
        $query = \DB::table('it_equipment as i')
        -> where('subtype_id', '=', $subtype)
        -> where('status_id', '=', $status)
        -> get();
        return $query;
    }

    public static function countByStatusType($status , $type){
        $query = \DB::table('it_equipment as i')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'i.subtype_id')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
        -> where('type_id', '=', $type)
        -> where('status_id', '=', $status)
        -> get();
        return $query;
    }

    public static function countByStatusTypeQuantity($status , $type){
        $query = \DB::table('it_equipment as i')
        -> leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', 'i.subtype_id')
        -> leftjoin('it_equipment_type', 'it_equipment_type.id', 'it_equipment_subtype.type_id')
        -> select( "i.subtype_id", DB::raw("COUNT(i.subtype_id) as qty") , 'it_equipment_subtype.name')
        -> where('type_id', '=', $type)
        -> where('status_id', '=', $status)
        -> groupBy('i.subtype_id' , 'it_equipment_subtype.name')
        -> orderBy('qty' , 'desc')
        -> get();
        // dd ($query);
        return $query;
    }

    public static function add_equipment($params){
        $results = [];
        $results['error'] = 1;
        $results['message'] = 'error';


        $it_equipment = new TblItEquipment;
        $it_equipment->subtype_id =  $params['subtype_id'];
        $it_equipment->brand =  $params['brand'];
        $it_equipment->model =  $params['model'];
        $it_equipment->details = $params['details'];
        $it_equipment->serial_no = $params['serial_no'];
        $it_equipment->or_no = $params['or_no'];
        $it_equipment->user_id = $params['user_id'];
        $it_equipment->status_id = $params['status_id'];
        $it_equipment->warranty_start = $params['warranty_start'];
        $it_equipment->warranty_end = $params['warranty_end'];
        $it_equipment->supplier_id = $params['supplier_id'];
        if($params['unit_id'] == "NULL"){
            $it_equipment->unit_id = null;
        }else{
            $it_equipment->unit_id = $params['unit_id'];
        }
        if(isset($params['imei_or_macaddress'])){
            $it_equipment->imei_or_macaddress = $params['imei_or_macaddress'];
        }

        try{
          $it_equipment->save();
          $id = DB::getPdo()->lastInsertId();

          $results['error'] = 0;
          $results['message'] = 'equipment has been added';
          return $id;


        }catch ( QueryException $e){
            $results['error'] = 0;
            $results['message'] = $e;
        }
        return $results;
    }

    public static function update_equipment_status($id,$status){
        $it_equipment = TblItEquipment::find($id);
        $it_equipment->status_id = $status;
        $it_equipment->updated_at = gmdate('Y-m-d H:i:s');

        $it_equipment->save();
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public static function delete_equipment($params){
      $it_equipment = TblItEquipment::find($params);
      $it_equipment->delete();
      $id = DB::getPdo()->lastInsertId();
      return $id;
    }


    public static function edit_equipment( $params ){
        // dd($params);

        $it_equipment = TblItEquipment::find($params['id']);
        $id = TblItEquipment::find($params['id']);
        // dd($params);
        if(isset($params['subtype_id']))
        $it_equipment->subtype_id = $params['subtype_id'];

        if(isset($params['brand']))
        $it_equipment->brand = $params['brand'];

        if(isset($params['model']))
        $it_equipment->model = $params['model'];

        if(isset($params['details']))
        $it_equipment->details = $params['details'];

        if(isset($params['serial_no']))
        $it_equipment->serial_no = $params['serial_no'];

        if(isset($params['or_no']))
        $it_equipment->or_no = $params['or_no'];

        if(isset($params['status_id']))
        $it_equipment->status_id = $params['status_id'];

        if(isset($params['supplier']))
        $it_equipment->supplier_id = $params['supplier'];

        if(isset($params['unit_id'])){
          if($params['unit_id'] == "NULL"){
              $it_equipment->unit_id = null;
          }else {
            $it_equipment->unit_id = $params['unit_id'];
          }
        }

        if(isset($params['warranty_start']))
        $it_equipment->warranty_start = $params['warranty_start'];

        if(isset($params['warranty_end']))
        $it_equipment->warranty_end = $params['warranty_end'];

        $it_equipment->updated_at = gmdate('Y-m-d H:i:s');

        try {
            $it_equipment->save();
            $id = DB::getPdo()->lastInsertId();
            return $id;
        }catch(QueryException $qe){
            return \Redirect::to('/inventoryAll')
            ->with('error' , 'Database cannot read input value.')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#edit-'.$params['id']);
        }
    }

    public static function get_received_purchases($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('purchases', 'purchases.or_no', '=', 'it_equipment.or_no')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> select('it_equipment.*', 'purchases.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_equipment_by_status($status){
        $query = TblItEquipment::leftjoin('equipment_status', 'equipment_status.id', '=', 'status_id')
        ->leftjoin('supplier', 'supplier.id', '=', 'supplier_id')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        ->select('it_equipment_type.name as type', 'it_equipment_subtype.name as subtype', 'it_equipment.id as eqId', 'brand', 'model', 'it_equipment.created_at', 'or_no', 'supplier.supplier_name as supplier')
        ->where('status_id', '=', $status)
        ->orderBy('subtype_id', 'asc')
        ->get();

        return $query;
    }

    public static function getByType($category){
        $query = TblItEquipment::leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'subtype_id')
        -> select('*')
        -> where('it_equipment_subtype.type_id', '=', $category)
        -> get();
        return $query;
    }

    public static function getEqPerStatusSubtype($status, $subtype){
        $query = TblItEquipment::leftjoin('equipment_status', 'equipment_status.id', '=', 'status_id')
        ->leftjoin('supplier', 'supplier.id', '=', 'supplier_id')
        ->select('equipment_status.name', 'it_equipment.id', 'brand', 'model', 'it_equipment.created_at', 'it_equipment.created_at', 'or_no', 'supplier.supplier_name')
        ->where('status_id', '=', $status)
        ->where('subtype_id', '=', $subtype)
        ->get();
        return $query;
    }

    public static function getCountsByStatus($status){
        $query = TblItEquipment::selectRaw('subtype_id, it_equipment_type.name as type, it_equipment_subtype.name as subname, count(*) as qty, it_equipment.created_at as date_added')
        ->leftjoin('it_equipment_subtype', 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        ->leftjoin('it_equipment_type', 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        ->where('status_id', '=', $status)
        ->groupBy('subtype_id')
        ->get();

        return $query;
    }

    public static function getEquipment($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> leftjoin('supplier', 'supplier.id', '=', 'it_equipment.supplier_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype','it_equipment_type.name as type', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname', 'supplier.supplier_name as supplier', DB::raw("DATE_FORMAT(it_equipment.created_at, '%m-%d-%Y') as added_at"))
        -> get();
        return $query;
    }

    public static function get_serial_no($params = null){
        $query = \DB::table('it_equipment')
        -> select('serial_no')
        -> get();
        return $query;
    }

}
