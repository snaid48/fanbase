<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment_event extends Model
{
    protected $table = "comment_events";
    // protected $fillable = ['event_id','posting','comment'];
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo('App\User','posting');
    }

    
    public function event(){
        return $this->belongsTo('App\News','event_id');
    }
}
