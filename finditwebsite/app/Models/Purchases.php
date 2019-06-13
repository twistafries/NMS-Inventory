<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';
    public $timestamps = false;
    public $primaryKey = 'purchase_no';

    public static function get_purchases($params = null){
        $query = \DB::table('purchases')
        -> select('purchases.*')
        -> orderBy('date_of_purchase' , 'desc')
        -> get();
        return $query;
    }

    public static function get_completed_purchases($params = null){
        $query = \DB::table('purchases')
        -> select('purchases.*')
        -> where('or_no', '!=', null)
        -> whereBetween('date_of_purchase', [$params['start'], $params['end']])
        -> orderBy('date_of_purchase' , 'desc')
        -> get();
        return $query;
    }


    public static function add_purchase($params){
      $purchases = new Purchases;
  		$purchases->purchase_no = $params['purchase_no'];
      $purchases->user_id = $params['user_id'];

  		try {
  			$purchases->save();
  		}catch(QueryException $e) {
  			die($e);
  		}

  	}

    public static function edit_purchase($id, $or_no){
      $purchase_no = $id;
      $purchases = Purchases::find($purchase_no);
  		$purchases->or_no = $or_no;
  		try {
  			$purchases->save();
  		}catch(QueryException $e) {
  			die($e);
  		}
  	}

}
