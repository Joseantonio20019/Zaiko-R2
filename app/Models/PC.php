<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    use HasFactory;


    protected $fillable = [
        'CPU',
        'CPU Model',
        'RAM Type',
        'RAM Size',
        'O.S'
    ];
}
