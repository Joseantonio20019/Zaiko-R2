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
        'mark',
        'site',
        'ubication',
        'department',
        'user',
    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
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


    public function ubications(){
        return $this->belongsToMany(Ubication::class);
    }

    public function register(){

        return $this->hasMany(Register::class);
    }

    public function family(){

        return $this->belongsTo(Family::class);

    }



}
