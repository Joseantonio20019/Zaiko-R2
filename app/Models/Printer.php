<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $fillable = [

        'device_id',
        'ink',
        'USB',
        'COM',
        'WIFI',
        'Ethernet',
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
