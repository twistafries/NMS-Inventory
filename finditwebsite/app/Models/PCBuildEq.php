<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PCBuildEq extends Model
{
    protected $table = 'it_equipment';
    /*
    public function getDetailsAttribute($item){
        $socket = preg_split("~\r\n~", $item);
        $item = $socket[0];
        return $item;
    }
    */
}
