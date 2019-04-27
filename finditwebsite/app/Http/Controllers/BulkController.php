<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblSystemUnits;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblItEquipmentType;
use Session, Auth;

class BulkController extends BaseController
{
    public function showFields(){
        $data = [];
              $data['peripherals'] = TblItEquipment::get_computer_peripherals();
      // dd($data);
        $data['component'] = TblItEquipment::get_computer_component();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_types'] = TblItEquipmentType::get_all_equipment_type();
        $data['software'] = TblItEquipment::get_software();
        $data['system_units'] = TblSystemUnits::get_all_system_units();
        $data['units'] = TblSystemUnits::get_all_system_units();
        $data['systemunits'] = TblSystemUnits::get_all_system_units();
        $data['units_system'] = TblSystemUnits::get_all_system_units();
        $data['all_units'] = TblSystemUnits::get_all_system_units();
        $data['equipment_subtypes'] = TblItEquipmentSubtype::get_all_equipment_subtype();
        $data['component_subtypes'] = TblItEquipmentSubtype::get_component_subtype();
        // $data['system_units'] = TblSystemUnits::get_all_system_units();
        
        // return view ('content/bulk-add' , $data);
        return view ('content/bulk-add-temp' , $data);
    }

   public function bulkAddInventory(Request $request){
    //    dd($request);
    
    // for($count = 0; $count<count($_POST['hidden_name']); $count++){
    //     $data = array(
    //         'name'=>$request->hidden_name[$count],
    //         'details'=>$request->hidden_details[$count],
    //         'serial_no'=>$request->hidden_serial_no[$count],
    //         'or_no'=>$request->or_no[$count],
    //         'supplier'=>$request->hidden_supplier[$count],
    //     );
        
    //     // $data = array(
    //         // ':name' => $_POST['hidden_name'][$count],
    //         // ':details' => $_POST['hidden_details'][$count]
    //         // );
    //         // $statement = $connect->prepare($query);
    //         // $statement->execute($data);
    // }
    // for($count = 0; $count<count($_POST['bulk_brand']); $count++){
        // dd($request);
        $session=Session::get('loggedIn');
        $user_id = $session['id'];
        // dd($user_id);
        $show = $request->all();
        // dd($show);
        $data = $request->input('bulk.*');
        $data['inventory'] = collect([]);
        $brands = $request->get('bulk')['brand'];
        $model = $request->get('bulk')['model'];
        $details = $request->get('bulk')['details'];
        $serial_no = $request->get('bulk')['serial_no'];
        $or_no = $request->get('bulk')['or_no'];
        // dd($brands);
        
        $count = 0;
        foreach($brands as $brand){
            $data['inventory'] -> push([
                'brand' => $brand,
                'model' => $model[$count],
                'details' => $details[$count],
                'serial_no' => $serial_no[$count],
                'or_no' => $or_no[$count],
            ]);
            $count++;
        }
        
        // $data = array(
            // ':name' => $_POST['hidden_name'][$count],
            // ':details' => $_POST['hidden_details'][$count]
            // );
            // $statement = $connect->prepare($query);
            // $statement->execute($data);
    // }
        
        dd($data);
    }
}
