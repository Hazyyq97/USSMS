<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umpire extends Model
{
    protected $fillable=[
        'name',
        'email',
        'sport_id',
        'event_id',
        'address',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function sports(){
        return $this->belongsTo('App\Sport', 'sport_id');
    }

    public function events(){
        return $this->belongsTo('App\Event', 'event_id');
    }
}
