<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItEquipment;

class InventoryController extends BaseController
{
    public function showAllInventory(){
    //     $data = [];
    //     $data['equipment'] = TblItEquipment::get_all_equipment();
    //     // dd($data);
    //     return view ('content/inventory' , $data);
    }
    
    public function showComputerPeripherals(){
        $data = [];
        $data['peripherals'] = TblItEquipment::get_computer_peripherals();
        // dd($data);
        return view ('content/inventory' , $data);
    }
    
    // public function getTableColumns(){
    //     $data = [];
    //     $data['table_header'] = TblItEquipment::get_table_columns();
    //     dd($data);
    //     return view ('content/inventory' , $data);
    // }
}
