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

    public function events(){
        return $this->belongsToMany('App\Event', 'event_team', 'event_id', 'team_id')->withPivot('seen')
            ->withTimestamps();
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }


}
