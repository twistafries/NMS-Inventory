<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipmentType extends Model
{
    public static function get_all_equipment_type($params = null){
        $query = \DB::table('it_equipment_type')
        -> orderBy('id' , 'asc')
        -> get();
        return $query;
    }
}
