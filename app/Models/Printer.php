<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ink',
        'USB',
        'COM',
        'WIFI',
        'Ethernet',
    ];



    public function device(){

        return $this->belongsTo(Device::class,'id');
    
    }

}
