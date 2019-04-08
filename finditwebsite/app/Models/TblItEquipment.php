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
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name','it_equipment_type.name as type_name', 'it_equipment_type.id as type_id')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_peripherals($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name')
        -> where('it_equipment_subtype.type_id' , '=' , '2')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_component($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name')
        -> where('it_equipment_subtype.type_id' , '=' , '1')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }


    public static function get_mobile_devices($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as status_name','it_equipment_subtype.name as subtype_name')
        -> where('it_equipment_subtype.type_id' , '=' , '3')
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

}
