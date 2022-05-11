<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardDrive extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'type',
        'pc_id'
    ];


    public function pc()
    {
        return $this->belongsTo(Computer::class,'pc_id');
    }


}
