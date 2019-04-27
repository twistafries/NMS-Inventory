<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
<<<<<<< HEAD
        -> leftjoin('users', 'users.id', '=', 'it_equipment.user_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name', 'users.fname as firstname', 'users.lname as lastname')
=======
        -> select('it_equipment.*', 'equipment_status.name as status_name', 'it_equipment.subtype_id as subtype_id', 'it_equipment_subtype.name as subtype_name')
>>>>>>> d3736a732aaf446511e76e030f4ee37cab49ccae
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
    // INSERT INTO `findit`.`it_equipment`
    // (`subtype_id`, `name`, `details`,
    // `serial_no`, `or_no`, `status_id`)
    // VALUES ('6', 'EVGA SuperNOVA 750', '750 W', '80-R5-7854-TY', '43790', '1', '1');


    public static function add_equipment($params){
        $results = [];
        $results['error'] = 1;
        $results['message'] = 'error';


        $it_equipment = new TblItEquipment;
        $it_equipment->subtype_id =  $params['subtype_id'];
        $it_equipment->name =  $params['name'];
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
    }

    public static function delete_equipment($params){
      $it_equipment = TblItEquipment::find($params);
      $it_equipment->delete();
    }

    // Parehas ba to sa add equipment????
    public static function update_equipment($params){
      $it_equipment = TblItEquipment::find($params['id']);
        $results = [];
        $results['error'] = 1;
        $results['message'] = 'error';
        
        
        $it_equipment = new TblItEquipment;
        $it_equipment->subtype_id =  $params['subtype_id'];
        $it_equipment->name =  $params['name'];
        $it_equipment->details = $params['details'];
        $it_equipment->serial_no = $params['serial_no'];
        $it_equipment->or_no = $params['or_no'];
        $it_equipment->user_id = $params['user_id'];
        $it_equipment->status_id = $params['status_id'];
        $it_equipmen->updated_at = gmdate('Y-m-d H:i:s');
        if($params['unit_id'] == "NULL"){
            $it_equipment->unit_id = null;
        }else{
            return $it_equipment->unit_id = $params['unit_id'];
        }

        try{
          $it_equipment->save();
          $results['error'] = 0;
          $results['message'] = 'equipment has been added';


        }catch ( QueryException $e){
            $results['error'] = 0;
            $results['message'] = $e;
        }
        return $results;
    }

    public static function edit_equipment( $params ){
        $it_equipment = TblItEquipment::find($params['id']);

        if(isset($params['subtype_id']))
        $it_equipment->subtype_id = $params['subtype_id'];

        if(isset($params['name']))
        $it_equipment->name = $params['name'];
        
        if(isset($params['details']))
        $it_equipment->details = $params['details'];

        if(isset($params['serial_no']))
        $it_equipment->serial_no = $params['serial_no'];

        if(isset($params['or_no']))
        $it_equipment->or_no = $params['or_no'];

        if(isset($params['status_id']))
        $it_equipment->status_id = $params['status_id'];
        
        if(isset($params['supplier']))
        $it_equipment->status_id = $params['supplier'];

        $it_equipment->updated_at = gmdate('Y-m-d H:i:s');

        try {
            $it_equipment->save();
        }catch(QueryException $e){
            die($e);
        }
    }


    




}
