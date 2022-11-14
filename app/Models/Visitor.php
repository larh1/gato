<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $fillable = [
        "browser",
        "ip_address",
        "time_visit"
    ];

    public $timestamps=false;
}
