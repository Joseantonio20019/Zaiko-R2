<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUbication extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'register_id',
        'ubications_id',
        'modification_date'
    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
        'modification_date' => 'datetime: d-m-Y',
    ];

    
}
