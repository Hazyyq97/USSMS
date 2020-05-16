<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable= [
        'sport_id',
        'event_id',
        'teamA',
        'teamB',
        'date_time',
    ];
    public function sports(){
        return $this->belongsTo('App\Sport', 'sport_id');
    }

    public function events(){
        return $this->belongsTo('App\Event', 'event_id');
    }

    public function teams(){
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function umpires(){
        return $this->belongsTo('App\Umpire');
    }

}
