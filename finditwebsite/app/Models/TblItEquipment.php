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
