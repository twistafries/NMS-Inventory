<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipment extends Model
{
    protected $table = 'it_equipment';
    public $timestamps = false;

    public static function get_all_equipment($params = null){
        $query = \DB::table('it_equipment')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;    
    }
    
    public static function get_computer_peripherals($params = null){
        $query = \DB::table('it_equipment')
        -> where('type_id' , '=' , '1')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;    
    }

    public static function get_mobile_devices($params = null){
        $query = \DB::table('it_equipment')
        -> where('type_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;    
    }
    

/*
INSERT INTO `findit`.`it_equipment` (`type_id`, `name_or_model`, 
`details`, `serial_no`, `or_no`, `unit_id`, `status_id`) 
VALUES ('1', 'Keyboard', 'Logitech', '897adP', '7984563', '2', '1'); 
*/ 

    public static function add_equipment($params){
        $results = [];
        $results['error'] = 1;
        $results['message'] = 'error';

        $it_equipment = new TblItEquipment;
        $it_equipment->type_id =  $params['type_id'];
        $it_equipment->name_or_model = $params['name_or_model'];
        $it_equipment->details = $params['details'];
        $it_equipment->serial_no = $params['serial_no'];
        $it_equipment->or_no = $params['or_no'];
        $it_equipment->unit_id = $params['unit_id'];

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
