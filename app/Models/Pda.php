<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pda extends Model
{
    use HasFactory;

    protected $fillable = [

        'device_id',
        'MAC',
        'serial_number',
        'imei',

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'device_id');
    }

    

}
