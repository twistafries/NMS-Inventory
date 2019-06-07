<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth;

use App\Models\PCBuildEq;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblStatus;
use App\Models\TblSystemUnits;
use App\Models\TblItEquipment;

class PCBuildController extends Controller
{
    public function buildPC()
    {
        $it_equipment = PCBuildEq::where('status_id', '=', 1)->get();
        $equipment_status = TblStatus::all();
        $eq_subtype = TblItEquipmentSubtype::all();
        return view('content.buildpc', compact('it_equipment', 'equipment_status', 'eq_subtype'));
    }

    public function buildFromParts(Request $request){   
        try{
            $data = $request->all();

            $session=Session::get('loggedIn');
            $user_id = $session['id'];
            $data['user_id'] = $user_id;

            $unit_id = TblSystemUnits::add_system_unit($data);

            $components = $data['components'];

            foreach($components as $component){
                $data['unit_id'] = $unit_id;
                $data['status_id'] = 8;
                $data['id'] = $component;
                TblItEquipment::edit_equipment($data);
            }

            return \Redirect::to('/inventoryAll')->with('message','System unit has been added.');
        }catch(QueryException $qe){
        // $info = Self::getErrorInfo();
        // dd($qe);
        // dd($info);
        return \Redirect::to('/inventoryAll')
        ->with('error' , 'Encountered an error;')
        ->with('error_info' , $qe->getMessage())
        ->with('target' , '#build');
      }

    }
}
