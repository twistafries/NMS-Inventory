<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblStatus extends Model
{
    public static function get_all_equipment_status($params = null){
        $query = \DB::table('equipment_status')
        -> orderBy('name' , 'asc')
        -> get();
        // dd($query);
        return $query;
    }
    
    public static function get_pending_and_available_status($params = null){
        $query = \DB::table('equipment_status')
        -> orderBy('name' , 'asc')
        -> where('id' , '=' , '1')
        -> where('id' , '=' , '6')
        -> get();
        // dd($query);
        return $query;
    }
}
