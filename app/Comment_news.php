<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment_news extends Model
{
    protected $table = "comment_news";
    // protected $fillable = ['event_id','posting','comment'];
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo('App\User','posting');
    }

    
    public function news(){
        return $this->belongsTo('App\News','news_id');
    }
}
