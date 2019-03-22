<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipment extends Model
{
    protected $table = 'it_equipment';
    public $timestamps = false;

    public static function get_all_equipment($params = null){
        $query = \DB::table('it_equipment')
        -> join('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> join('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_peripherals($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('it_equipment_subtype.type_id' , '=' , '2')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_computer_component($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('it_equipment_subtype.type_id' , '=' , '1')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }


    public static function get_mobile_devices($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('it_equipment_subtype.type_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }


/*
INSERT INTO `findit`.`it_equipment` (`type_id`, `name_or_model`, `details`, `serial_no`, `or_no`, `unit_id`, `status_id`)
VALUES ('1', 'Keyboard', 'Logitech', '897adP', '7984563', '2', '1');
*/

    public static function add_equipment($params){
        $it_equipment = new TblItEquipment;
        $it_equipment->type_id =  $params['type_id'];
        $it_equipment->name_or_model = $params['name_or_model'];
        $it_equipment->name_or_model = $params['details'];
        $it_equipment->name_or_model = $params['serial_no'];
        $it_equipment->name_or_model = $params['or_no'];
    }





    // public static function get_table_columns(){
    //     $table = \DB::table('it_equipment')
    //     DB::connection()->getDoctrineColumn('table', '')->getName();
    //     // -> getSchemaBuilder()
    //     // -> getColumnListing();
    //     // return $table;

    //     // return DB::getSchemaBuilder()->getColumnListing($table);
    //     // return Schema::getColumnListing($table);
    // }
}
