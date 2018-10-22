<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function news(){
        return $this->hasMany('App\News','author');
    }

    public function event(){
        return $this->hasMany('App\Event','posting');
    }

    public function historical(){
        return $this->hasMany('App\Historical','posting');
    }
    public function comment_event(){
        return $this->hasMany('App\Comment_event','posting');
    }



}
