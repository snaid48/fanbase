<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    // whitelist untuk memperbolehkan apa saja yang boleh di proses
    // protected $fillable = ['news_title','news_field','author'];
    // definisikan penggunaannya
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // memblacklist field tertentu dengan menyebutkan namanya
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo('App\User','author');
    }

    public function comment_news(){
        return $this->hasMany('App\Comment_news','news_id');
    }

    public function rating(){
        return $this->hasMany('App\Rating_news','news_id');
    }

}
