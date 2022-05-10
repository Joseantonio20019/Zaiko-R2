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
        'mark_id'
    ];


    public function monitors(){


        return $this->hasMany(Monitor::class);
    }

    public function printers(){


        return $this->hasMany(Printer::class);
    }


}
