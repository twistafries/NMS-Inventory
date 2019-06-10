<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\QueryException;
use App\Models\TblItEquipment;
use App\Models\InventoryConcerns;
use App\Models\TblItEquipmentType;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblSystemUnits;
use App\Models\TblStatus;
use App\Models\TblEquipmentStatus;
use App\Models\Equipment;
use App\Models\TblActivityLogs;
use App\Models\TblIssuances;
use App\Models\Suppliers;
use Session, Auth;
use DB;

class InventoryConcernsController extends BaseController
{

    public function markForConcernsEquipment(Request $request){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $session=Session::get('loggedIn');
        $user_id = $session['id'];

        try{
            $data = $request->all();
            $data['added_by'] = $user_id;
            $data['issued_to'] = TblIssuances::getIssuedTo($data['id']);
            $data['name_component'] = $data['id'];
            $data['system_unit_id'] = 'NULL';
            $equipment_info = TblItEquipment::get_equipment_info($data['id'])[0];
            // dd($equipment_info);
            // $orig_status_name = TblEquipmentStatus::get_status_name($data['orig_status_id']);
            $orig_status_name = TblItEquipment::get_equipment_info($data['id'])[0]->status_id;
            $new_status_name = TblEquipmentStatus::get_status_name($data['status_id'])[0]->name;
            $act['activity'] = "change the status of";
            $act['from_status'] = $orig_status_name;
            $act['to_status'] = $new_status_name;
            $act['data'] = $data['id'];
            if(isset($data['status_id'])){
                TblItEquipment::update_equipment_status($data['id'],$data['status_id']);
                InventoryConcerns::addConcern($data);
                TblActivityLogs::add_log($act);
            }
            return \Redirect::back()
            ->with('message' , 'Marked equipment status of, '. $equipment_info->brand.' '.$equipment_info->model.' from "'.$orig_status_name. '" to "'.$new_status_name.'".');
        }catch(Exception $e){

        }catch(QueryException $qe){
            return \Redirect::back()
            ->with('error' , 'Database cannot read input value.')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#edit-'.$params['id']);
        }
    }

        public function markForConcernsSystemUnit(Request $request){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $session=Session::get('loggedIn');
        $user_id = $session['id'];

        try{
            $data = $request->all();
            $data['added_by'] = $user_id;
            $data['issued_to'] = TblIssuances::getIssuedTo($data['id']);
            $data['name_component'] = 'NULL';
            $data['system_unit_id'] = $data['id'];
            $equipment_info = TblItEquipment::get_equipment_info($data['id'])[0];
            // dd($equipment_info);
            // $orig_status_name = TblEquipmentStatus::get_status_name($data['orig_status_id']);
            $orig_status_name = TblSystemUnits::getUnit($data['id'])[0]->status_name;
            $new_status_name = TblEquipmentStatus::get_status_name($data['status_id'])[0]->name;
            $act['activity'] = "change the status of";
            $act['from_status'] = $orig_status_name;
            $act['to_status'] = $new_status_name;
            $act['data'] = $data['id'];
            if(isset($data['status_id'])){
                TblSystemUnits::update_system_unit_status($data['id'],$data['status_id']);
                InventoryConcerns::addConcern($data);
                TblActivityLogs::add_log($act);
            }
            return \Redirect::to('/inventoryAll')
            ->with('message' , 'Marked equipment status of, '. $equipment_info->brand.' '.$equipment_info->model.' from "'.$orig_status_name. '" to "'.$new_status_name.'".');
        }catch(Exception $e){
            return \Redirect::back()
            ->with('error' , 'Database cannot read input value.')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#edit-'.$params['id']);
        }catch(QueryException $qe){
            return \Redirect::back()
            ->with('error' , 'Database cannot read input value.')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#edit-'.$params['id']);
        }
    }
}
