<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $fillable = [

        'inches',
        'HDMI',
        'VGA',
        'DVI',
        'DisplayPort',
    ];

    public function device(){

        return $this->belongsTo(Device::class);

    }


}
