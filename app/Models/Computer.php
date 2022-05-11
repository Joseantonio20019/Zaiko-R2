<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;


    protected $fillable = [

        'cpu',
        'cpu_model',
        'ram_type',
        'ram_size',
        'os'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'id');
    }

    public function hardDrives(){

        return $this->hasMany(HardDrive::class,'pc_id');

    }
}