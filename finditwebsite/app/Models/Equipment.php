<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  protected $fillable = [
        'subtype_id',
        'name',
        'details',
        'serial_no',
        'or_no',
        'user_id',
        'unit_id',
        'status_id',
     ];
}
