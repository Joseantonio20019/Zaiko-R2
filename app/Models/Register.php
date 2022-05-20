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

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
    ];

    public function devices(){
        
        return $this->belongsTo(Device::class);
    }

}
