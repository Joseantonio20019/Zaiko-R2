<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'site_id'
    ];


    public function site(){

        return $this->belongsTo(Site::class);

    }

}
