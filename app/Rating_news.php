<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating_news extends Model
{
    protected $table = "rating_news";
    // protected $fillable = ['event_id','posting','comment'];
    protected $guarded = [];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo('App\User','posting');
    }

    
    public function rating_news(){
        return $this->belongsTo('App\News','news_id');
    }

    
}
