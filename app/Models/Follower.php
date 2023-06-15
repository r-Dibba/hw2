<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $timestamps = false;

    public function followed(){
        return $this->belongsToMany('App\Model\User', 'users', 'f_username', 'username');
    }
    public function follows(){
        return $this->belongsToMany('App\Model\User', 'users', 'follows', 'username');
    }
    
    
}

?>