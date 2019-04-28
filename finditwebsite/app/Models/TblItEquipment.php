<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id', 'users.fname as firstname', 'users.lname as lastname')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_peripherals($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'users.fname as firstname', 'users.lname as lastname')
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
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'it_equipment.subtype_id as subtype_id', 'users.fname as firstname', 'users.lname as lastname')
        -> where('it_equipment_subtype.type_id' , '=' , '1')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }


    public static function get_mobile_devices($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'users.fname as firstname', 'users.lname as lastname')
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
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'users.fname as firstname', 'users.lname as lastname')
        -> where('it_equipment_subtype.type_id' , '=' , '4')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_supplier($params = null){
        $query = \DB::table('it_equipment')
        -> select('it_equipment.supplier as supplier')
        -> groupBy('supplier')
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
        $it_equipment->supplier = $params['supplier'];
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
          return $id;
          $results['error'] = 0;
          $results['message'] = 'equipment has been added';


        }catch ( QueryException $e){
            $results['error'] = 0;
            $results['message'] = $e;
        }
        return $results;
    }

    public static function update_equipment_status($id,$status){
      $it_equipment = TblItEquipment::find($id);
      $it_equipment->status_id = $status;
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
        $it_equipment->supplier = $params['supplier'];
        
        if(isset($params['unit_id']))
        $it_equipment->unit_id = $params['unit_id'];

        $it_equipment->updated_at = gmdate('Y-m-d H:i:s');

        try {
            $it_equipment->save();
            $id = DB::getPdo()->lastInsertId();
            return $id;
        }catch(QueryException $e){
            die($e);
        }
    }







}
