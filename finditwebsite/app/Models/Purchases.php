<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';
    public $timestamps = false;

    public static function get_purchases($params = null){
        $query = \DB::table('purchases')
        -> select('purchases.*')
        -> orderBy('date_of_purchase' , 'desc')
        -> get();
        return $query;
    }

    public static function add_purchases($params){
      $purchases = new Purchases;
  		$purchases->supplier_name = $params;

  		try {
  			$supplier->save();
  			$id = DB::getPdo()->lastInsertId();
  			return $id;
  		}catch(QueryException $e) {
  			die($e);
  		}

  	}



}
