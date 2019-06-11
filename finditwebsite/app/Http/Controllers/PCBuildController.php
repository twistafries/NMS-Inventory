<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth;

use App\Models\PCBuildEq;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblStatus;
use App\Models\TblSystemUnits;
use App\Models\TblItEquipment;
use App\Models\TblDepartments;
use App\Models\PurchasedItems;
use App\Models\Purchases;

class PCBuildController extends Controller
{
    public function buildPC()
    {
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }
        $it_equipment = PCBuildEq::where('status_id', '=', 1)->get();
        $equipment_status = TblStatus::all();
        $eq_subtype = TblItEquipmentSubtype::all();
        $departments = TblDepartments::all();
        return view('content.buildpc', compact('it_equipment', 'equipment_status', 'eq_subtype', 'departments'));
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
    

    public function bulkAddUnits(Request $request){
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }

        $data = $request->all();
        $session=Session::get('loggedIn');
        $user_id = $session['id'];
        $data['user_id'] = $user_id;
        $data['pID'] = $data['pcID'];
        $data['components'] = PurchasedItems::getUnitItems($data['pcID']);
        $data['qty'] = $data['qty'];
        $data['supplier_id'] = $data['components'][0]->supplier_id;
        $data['rows'] = count($data['components']);
        $data['supplier'] = ($data['components'][0]->supplier);
        return view('content.bulkUnitAdd', $data);
    }

    public function insertBulkPC(Request $request){
        $session=Session::get('loggedIn');
        try{
            $data = $request->all();
            dd($data);
            $user_id = $session['id'];
            $count = 0;
            $sUnit = [];
            $sUnit['or_no'] = $data['or_no'];
            $sUnit['user_id'] = $user_id;
            $sUnit['subtype'] = array_unique($data['subtype']);
            for($count; $count < $data['qty']; $count++){
                $sUnit['name'] = $data['name'][$count];
                TblSystemUnits::add_system_unit($sUnit);
            }
            return \Redirect::to('/inventoryAll')->with('message','System units added.');
        }catch(QueryException $qe){
            return \Redirect::to('/inventoryAll')
            ->with('error' , 'Encountered an error;')
            ->with('error_info' , $qe->getMessage())
            ->with('target' , '#build');
          }   
    }
}
