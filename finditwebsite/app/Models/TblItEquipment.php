<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblItEquipment extends Model
{
    public $timestamps = false;

    public static function get_Equipment($params = null){
        $query = \DB::table('it_equipment')
        -> where('status_id' , '=' , '1')
        -> orderBy('start' , 'desc')
        -> get();
    }
}
