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
}
