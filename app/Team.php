<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'photo_id',
        'event_id'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
