<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'supplier';
    public $timestamps = false;

    public static function get_suppliers($params = null){
        $query = \DB::table('supplier as s')
        -> select('supplier_name')
        -> groupBy('supplier_name')
        -> orderBy('id' , 'asc')
        -> get();
        return $query;
        dd($query);
    }

    public static function add_supplier($params){
      $supplier = new Suppliers;
  		$supplier->supplier_name = $params;

  		try {
  			$supplier->save();
  			$id = DB::getPdo()->lastInsertId();
  			return $id;
  		}catch(QueryException $e) {
  			die($e);
  		}

  	}


    public static function update_associate_status(){

    }

}
