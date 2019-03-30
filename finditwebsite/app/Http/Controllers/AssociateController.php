<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TblAssociate;


class AssociateController extends BaseController
{
    public function showAllAssociate(){
        $data = [];
        $data['associates'] = TblAssociate::get_all_associate();
        // dd($data);
        return view ('content/associates' , $data);
    }

   public function deactivateAccount(Request $request){
    //    $this->checkIfAdmin
        $data = $request->all();
        $updated = TblAssociate::update_associate_status($data);
   }
}
