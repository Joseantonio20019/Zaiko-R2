<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pda extends Model
{
    use HasFactory;

    protected $fillable = [

        'MAC',
        'serial_number',
        'imei',

    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'id');
    }

}
