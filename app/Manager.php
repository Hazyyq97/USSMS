<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function event(){
        return $this->belongsTo('App\Event');
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function sport(){
        return $this->belongsTo('App\Sport');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
