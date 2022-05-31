<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [

        'device_id',
        'extension',
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
