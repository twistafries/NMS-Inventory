<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'activity_log';
    public $timestamps = false;

    public static function get_suppliers($params = null){
        $query = \DB::table('supplier as s')
        -> orderBy('supplier_name' , 'asc')
        -> get();
        return $query;
    }

    public static function update_associate_status(){

    }

}
