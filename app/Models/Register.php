<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'comment',
        'device_id',
    ];

    public function devices(){
        
        return $this->hasMany(Device::class);
    }



}
