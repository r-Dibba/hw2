<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    public function follows(){
        return $this->belongsToMany('App\Models\User', 'followers', 'f_username', 'follows');
    }

    public function followedby(){
        return $this->belongsToMany('App\Models\User', 'followers', 'follows', 'f_username');
    }

    public function follows_info(){
        return $this->hasMany('App\Models\Follower', 'f_username', 'username');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post', 'author');
    }

    public function received(){
        return $this->hasMany('App\Models\Message', 'receiver', 'username');
    }

    public function sent(){
        return $this->hasMany('App\Models\Message', 'sender', 'username');
    }

    public function received_by(){
        return $this->belongsToMany('App\Models\User', 'messages', 'receiver', 'sender');
    }

    public function likes(){
        return $this->hasMany('Likes', 'username', 'username');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment', 'author', 'username');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification', 'notified_user', 'username');
    }

}
?>