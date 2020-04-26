<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrit extends Model
{
    protected $fillable = ['name' , 'status', 'zones_id'];
}
