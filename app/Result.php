<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'event_id',
        'sport_id',
        'category',
        'teamA',
        'teamB',
        'a_set1',
        'b_set1',
        'a_set2',
        'b_set2',
        'a_set3',
        'b_set3',
        'a_set4',
        'b_set4',
        'a_set5',
        'b_set5',
        'game_pointA',
        'game_pointB'
    ];

    public function events(){
        return $this->belongsTo('App\Event', 'event_id');
    }

    public function sports(){
        return $this->belongsTo('App\Sport', 'sport_id');
    }

    public function team(){
        return $this->belongsTo('App\Team' , 'teamA');
    }

    public function teams(){
        return $this->belongsTo('App\Team', 'teamB');
    }

}
