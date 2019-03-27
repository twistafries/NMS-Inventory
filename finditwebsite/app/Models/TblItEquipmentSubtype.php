<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipmentSubtype extends Model
{
    public static function get_all_equipment_subtype($params = null){
        $query = \DB::table('it_equipment_subtype')
        -> orderBy('name' , 'asc')
        -> orderBy('type_id' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }

    public static function get_all_component_subtype($params = null){
        $query = \DB::table('it_equipment_subtype')
        -> where('type_id' , '=' , '1')
        -> orderBy('name' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }

    public static function get_all_peripheral_subtype($params = null){
        $query = \DB::table('it_equipment_subtype')
        -> where('type_id' , '=' , '2')
        -> orderBy('name' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }
    
    public static function get_all_mobile_subtype($params = null){
        $query = \DB::table('it_equipment_subtype')
        -> where('type_id' , '=' , '3')
        -> orderBy('name' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }
}
