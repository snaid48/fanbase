<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // memblacklist field tertentu dengan menyebutkan namanya
    protected $guarded = [''];
}
