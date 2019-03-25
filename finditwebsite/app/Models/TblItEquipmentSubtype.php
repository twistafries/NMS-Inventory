<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipmentSubtype extends Model
{
    public static function get_all_equipment_subtype($params = null){
        $query = \DB::table('it_equipment_subtype')
        -> orderBy('id' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }
}
