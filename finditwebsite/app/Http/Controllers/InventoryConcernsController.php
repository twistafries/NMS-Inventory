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
use App\Models\Suppliers;
use Session, Auth;
use DB;

class InventoryConcernsController extends BaseController
{

    public function markForConcerns(Request $request){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $session=Session::get('loggedIn');
        $user_id = $session['id'];

        try{
            $data = $request->all();
            $data['added_by'] = $user_id;
            if(isset($data['status_id'])){
                TblItEquipment::update_equipment_status($data['id'],$data['status']);
                InventoryConcens::addConcern($data);
            } 
        }catch(Exception $e){
            
        }catch(QueryException $qe){
            return \Redirect::back()
            ->with('error' , 'Database cannot read input value.')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#edit-'.$params['id']);
        }
    }
}