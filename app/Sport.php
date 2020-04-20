<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable= ['name', 'event_id'];

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
