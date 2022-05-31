<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkDevice extends Model
{
    use HasFactory;


    protected $fillable = [

        'device_id',
        'manageable',
        'POE',
        'Speed',
        'ethernet_ports_number',
        'fiber_ports_number'
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
