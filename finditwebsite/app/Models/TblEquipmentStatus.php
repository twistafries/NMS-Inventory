<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblEquipmentStatus extends Model
{
    protected $table = 'it_equipment';
    public $timestamps = false;

    public static function get_for_repair($params = null){
        $query = \DB::table('it_equipment')
        -> join('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> join('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '3')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_for_disposal($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '5')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }

    public static function get_for_return($params = null){
        $query = \DB::table('it_equipment')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'it_equipment.status_id')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'it_equipment.subtype_id')
        -> select('it_equipment.*', 'equipment_status.name as stat')
        -> where('status_id' , '=' , '4')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;
    }
}