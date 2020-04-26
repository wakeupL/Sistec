<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = ['name' , 'rut', 'address', 'email', 'phone_number' , 'status'];
}
