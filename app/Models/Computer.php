<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;


    protected $fillable = [

        'device_id',
        'cpu',
        'cpu_model',
        'ram_type',
        'ram_size',
        'os'
    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'device_id');
    }

    public function hardDrives(){

        return $this->hasMany(HardDrive::class,'pc_id');

    }
}
