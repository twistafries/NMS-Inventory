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
        // dd($params);

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
            $inventory_concerns->system_unit = $params['system_unit_id'];
        }
        $inventory_concerns->added_by = $params['added_by'];
        $inventory_concerns->status_id = $params['status_id'];
        // dd($inventory_concerns);

        try{
            // dd($inventory_concerns);
          $inventory_concerns->save();
          $id = DB::getPdo()->lastInsertId();

          $results['error'] = 0;
          $results['message'] = 'Inventory Concerns Table Updated';
          $results['id'] = $id;

        }catch ( QueryException $e){
            $results['error_count'] = 1;
            $results['additional_error_info'] = $e->getMessage();
        }
        return $results;
    }

    public static function get_item_by_status($params){
        $query = \DB::table('inventory_concerns as i')
        -> leftjoin('equipment_status' , 'equipment_status.id', '=', 'i.status_id')
        -> leftjoin('it_equipment as item' , 'item.id', '=', 'i.name_component')
        -> leftjoin('system_units as unit' , 'unit.id', '=', 'i.system_unit')
        -> leftjoin('users' , 'users.id', '=', 'i.added_by')
        -> leftjoin('it_equipment_subtype' , 'it_equipment_subtype.id', '=', 'item.subtype_id')
        -> leftjoin('it_equipment_type' , 'it_equipment_type.id', '=', 'it_equipment_subtype.type_id')
        -> select('i.*', 'unit.*', 'item.*', 'i.status_id as status_id', 'it_equipment_subtype.name as subtype', 'it_equipment_type.name as type')
        -> where('i.status_id', '=', $params['status'])
        -> whereBetween('i.created_at', [$params['start'], $params['end']])
        -> orderBy('i.created_at', 'desc')
    		-> get();

        return $query;
    }
}
