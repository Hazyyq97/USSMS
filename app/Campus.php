<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable=[
        'fullname',
        'shortname',
        'photo_id',
        'phonenumber',
        'address'
    ];
}
