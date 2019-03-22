<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblItAssociate;


class AssociateController extends BaseController
{
    public function showAllAssociate(){
        $data = [];
        $data['associates'] = TblItAssociate::get_all_associate();
        // dd($data);
        return view ('content/associates' , $data);
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
