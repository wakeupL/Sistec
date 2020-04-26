<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name' , 'status'];

    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
