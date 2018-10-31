<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // memblacklist field tertentu dengan menyebutkan namanya
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo('App\User','posting');
    }

    public function comment_event(){
        return $this->hasMany('App\Comment_event','event_id')->orderBy('created_at', 'desc');
    }

    public function rating(){
        return $this->hasMany('App\Rating_events','event_id');
    }

    public function participate(){
        return $this->hasMany('App\EventParticipate','event_id');
    }


}
