<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment_historical extends Model
{
    protected $table = "comment_historicals";
    // protected $fillable = ['event_id','posting','comment'];
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo('App\User','author');
    }

    
    public function historical(){
        return $this->belongsTo('App\Historical','historical_id');
    }
}
