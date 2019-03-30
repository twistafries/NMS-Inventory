<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblEquipmentStatus;


class ForStatusController extends BaseController
{
    public function showAllStatus(){
        $data = [];
        $data['for_repair'] = TblEquipmentStatus::get_for_repair();
        $data['for_return'] = TblEquipmentStatus::get_for_return();
        $data['for_disposal'] = TblEquipmentStatus::get_for_disposal();
        return view ('content/dashboard' , $data);
    }

   public function showInventoryConcerns(){
     $data = [];
     $data['for_repair'] = TblEquipmentStatus::get_for_repair();
     $data['for_repair_units'] = TblEquipmentStatus::get_for_repair_units();
     $data['for_return'] = TblEquipmentStatus::get_for_return();
     $data['for_disposal'] = TblEquipmentStatus::get_for_disposal();
     $data['pending'] = TblEquipmentStatus::get_pending();
     return view ('content/concerns' , $data);

   }
}
