<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth, DB;

use App\Models\PCBuildEq;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblStatus;
use App\Models\TblSystemUnits;
use App\Models\TblItEquipment;
use App\Models\TblDepartments;
use App\Models\PurchasedItems;
use App\Models\Purchases;
use App\Models\TblActivityLogs;


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

    public function editPCpage(Request $request)
    {
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }
        $data = $request->all();
        $pc_name = $data['name'];
        $department = $data['department'];
        $dept_id = $data['dept_id'];
        // dd($data);
        $it_equipment = PCBuildEq::where('status_id', '=', 1)->get();
        $component = TblItEquipment::get_all_pc_parts($data);
        $unit_id = $data['unit_id'];
        $equipment_status = TblStatus::all();
        $eq_subtype = TblItEquipmentSubtype::all();
        $departments = TblDepartments::all();
        return view('content.editPC', compact('it_equipment', 'component', 'equipment_status', 'eq_subtype', 'departments', 'pc_name', 'department', 'dept_id', 'unit_id'));
    }

    public function editPC(Request $request)
    {
        if(Session::get('loggedIn')['user_type']!='admin' && Session::get('loggedIn')['user_type'] != "associate"){
            return \Redirect::to('/loginpage');
        }
        $data = $request->all();
        // dd($data);
        $unit_id = $data['unit_id'];
        TblSystemUnits::edit_pc($data);

        $parts = $data['oldparts'];

        foreach($parts as $parts){
            $data['unit_id'] = "NULL";
            $data['status_id'] = 7;
            $data['id'] = $parts;
            TblItEquipment::edit_equipment($data);
        }

        $components = $data['components'];

        foreach($components as $component){
            $data['unit_id'] = $unit_id;
            $data['status_id'] = 8;
            $data['id'] = $component;
            TblItEquipment::edit_equipment($data);
        }

        return \Redirect::to('/systemUnit')->with('message','System unit has been updated.');
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
        $data['qty'] = $data['components'][0]->qty;
        $data['qty_added'] = $data['comp_qty'];
        $data['supplier_id'] = $data['components'][0]->supplier_id;
        $data['rows'] = count($data['components']);
        $data['supplier'] = ($data['components'][0]->supplier);
        return view('content.bulkUnitAdd', $data);
    }

    public function insertBulkPC(Request $request){
        $session=Session::get('loggedIn');
        try{
            $data = $request->all();
            $user_id = $session['id'];
            $count = 0;
            $ctr = 0;
            $sUnit = [];

            $sUnit['or_no'] = $data['or_no'];
            $sUnit['user_id'] = $user_id;
            $sUnit['subtype'] = array_unique($data['subtype']);
            $sUnit['unit_number'] = $data['unit_number'];
            $pNo = Purchases::getByPID($data['purchase_no']);

            for($count; $count < $data['qty_added']; $count++){
                $sUnit['name'] = $data['name'][$count];
                $unit_id=TblSystemUnits::add_system_unit($sUnit);
                foreach($sUnit['subtype'] as $comp){
                    $it_equipment = new TblItEquipment;
                    $it_equipment->subtype_id = $comp;
                    $it_equipment->brand = $data['brand'][$ctr];
                    $it_equipment->model = $data['model'][$ctr];
                    $it_equipment->details = $data['dets'.$comp][$count];
                    $it_equipment->serial_no = $data['serial_no'.$comp][$count];
                    $it_equipment->or_no = $data['or_no'];
                    $it_equipment->user_id = $user_id;
                    $it_equipment->status_id = 8;
                    $it_equipment->warranty_start = $data['warranty_start'];
                    $it_equipment->warranty_end = $data['warranty_end'];
                    $it_equipment->supplier_id = $data['supplier_id'];
                    $it_equipment->unit_id = $unit_id;
                    $it_equipment->save();
                    $id = DB::getPdo()->lastInsertId();

                    $purchased_item = PurchasedItems::whereRAW('p_id = '.$data['purchase_no'].' AND subtype_id  ='.$comp.' AND unit_number = '.$data['unit_number'])->first();

                    if($purchased_item->qty_added == null){
                        $purchased_item->qty_added = $ctr;
                    } else {
                        $purchased_item->qty_added = $purchased_item->qty_added+$ctr;
                    }

                    $ctr++;

                    $log['data'] = $id;
                    $log['activity'] = "added";
                    TblActivityLogs::add_log($log);
                }


                $log['system_unit'] = $unit_id;
                $log['activity'] = "added";
                TblActivityLogs::add_log($log);
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
