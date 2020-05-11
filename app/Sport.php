<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable= ['name', 'event_id'];

    public function events(){
        return $this->belongsToMany('App\Event', 'event_team', 'event_id', 'sport_id')
            ->withTimestamps();
    }

}
