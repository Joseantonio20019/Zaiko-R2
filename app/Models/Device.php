<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;


    protected $fillable = [
        'inventory_number',
        'comment',
        'model',
        'family',
        'status',
        'mark'
    ];


    public function monitors(){


        return $this->hasMany(Monitor::class);
    }

    public function printers(){


        return $this->hasMany(Printer::class);
    }

    public function networkDevices(){
        return $this->hasMany(NetworkDevice::class);
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function computers(){
        return $this->hasMany(Computer::class);
    }

    public function pdas(){
        return $this->hasMany(Pda::class);
    }


}
