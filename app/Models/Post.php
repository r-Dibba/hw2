<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    public function author(){
        return $this->belongsTo('User', 'username', 'author');
    }

    public function reviewinfo(){
        return $this->hasOne('Review', 'r_id', 'id');
    }

    public function comments(){
        return $this->hasMany('Comment', null, 'id');
    }

    public function likedby(){
        return $this->hasMany('App\Models\Like', 'target_post', 'id');
    }

}

?>