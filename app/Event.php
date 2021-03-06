<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        'name',
        'campus_id',
        'detail',
        'date_range',
        'photo_id',
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function campus(){
        return $this->belongsTo('App\Campus');
    }

    public function teams(){
        return $this->belongsToMany('App\Team');
    }

    public function sports(){
        return $this->belongsToMany('App\Sport');
    }



}


