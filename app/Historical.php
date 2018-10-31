<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historical extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // memblacklist field tertentu dengan menyebutkan namanya
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo('App\User','author');
    }

    public function comment_historical(){
        return $this->hasMany('App\Comment_historical','historical_id')->orderBy('created_at', 'desc');
    }

    public function rating(){
        return $this->hasMany('App\Rating_historical','historical_id');
    }
}
