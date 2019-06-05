<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

use DB;

class InventoryConcerns extends Model
{
    protected $table = 'inventory_concerns';
    public $timestamps = false;

    public static function addConcern( $params ){
        $result = [];

        $inventory_concerns = new InventoryConcerns;
        if($params['issued_to'] == 'NULL'){
            $inventory_concerns->last_user	= null;
        }
        else{
            $inventory_concerns->last_user	= $params['issued_to'];
        }

        if($params['remarks'] == 'NULL'){
            $inventory_concerns->remarks = null;
        }else{
            $inventory_concerns->remarks = $params['remarks'];
        }

        if($params['name_component'] == 'NULL'){
            $inventory_concerns->name_component	 = null;
        }else{
            $inventory_concerns->name_component	 = $params['id'];
        }
        
        if($params['system_unit_id'] == 'NULL'){
            $inventory_concerns->system_unit = null;	
        }else{
            $inventory_concerns->name_component	 = $params['system_unit_id'];
        }
        $inventory_concerns->added_by = $params['added_by'];	
        $inventory_concerns->status_id = $params['status_id'];	

        try{
          $inventory_concerns->save();
          $id = DB::getPdo()->lastInsertId();

          $results['error'] = 0;
          $results['message'] = 'equipment has been added';
          return $id;
        }catch ( QueryException $e){
            $results['error'] = 0;
            $results['message'] = $e;
        }
        return $results;

    }
}