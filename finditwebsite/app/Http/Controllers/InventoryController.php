<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;
use App\Models\TblItEquipmentType;

class InventoryController extends BaseController
{
    public function showAllInventory(){
        $data = [];
        $data['equipment'] = TblItEquipment::get_all_equipment();
        $data['peripherals'] = TblItEquipment::get_computer_peripherals();
        $data['mobile'] = TblItEquipment::get_mobile_devices();
        $data['equipment_type'] = TblItEquipmentType::get_all_equipment_type();
        // dd($data);
        return view ('content/inventory' , $data);
    }
    
   public function addEquipment(){
       
   }
    
    // public function showComputerPeripherals(){
    //     $data = [];
    //     // dd($data);
    //     return view ('content/inventory' , $data);
    // }
    
    // public function getTableColumns(){
    //     $data = [];
    //     $data['table_header'] = TblItEquipment::get_table_columns();
    //     dd($data);
    //     return view ('content/inventory' , $data);
    // }
}
