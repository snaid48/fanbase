<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventParticipate extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // memblacklist field tertentu dengan menyebutkan namanya
    protected $guarded = [''];

    public function event(){
        return $this->belongsTo('App\Event','event_id');
    }
}
