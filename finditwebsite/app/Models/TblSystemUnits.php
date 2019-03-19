<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblSystemUnits extends Model
{
    public static function get_all_system_units($params = null){
        $query = \DB::table('system_units')
        -> orderBy('created_at' , 'desc')
        -> get();
        return $query;    
    }
}
