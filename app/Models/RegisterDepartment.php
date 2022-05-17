<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'register_id',
        'departments_id',
        'modification_date'

    ];
}
