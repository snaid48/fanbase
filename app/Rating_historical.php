<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating_historical extends Model
{
    protected $table = "rating_events";
    // protected $fillable = ['event_id','posting','comment'];
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo('App\User','posting');
    }

    
    public function rating(){
        return $this->belongsTo('App\News','historical_id');
    }
}
