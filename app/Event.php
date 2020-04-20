<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        'name',
        'organizer',
        'detail',
        'date_start',
        'date_end',
        'photo_id',
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
