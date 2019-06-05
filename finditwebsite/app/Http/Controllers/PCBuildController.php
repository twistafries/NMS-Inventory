<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PCBuildEq;
use App\Models\TblItEquipmentSubtype;
use App\Models\TblStatus;

class PCBuildController extends Controller
{
    public function buildPC()
    {
        $it_equipment = PCBuildEq::where('status_id', '=', 1)->get();
        $equipment_status = TblStatus::all();
        $eq_subtype = TblItEquipmentSubtype::all();
        return view('content.buildpc', compact('it_equipment', 'equipment_status', 'eq_subtype'));
    }
}
