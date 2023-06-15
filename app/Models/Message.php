<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender(){
        return $this->belongsTo('App\Models\User', 'username', 'sender');
    }

    public function receiver(){
        return $this->belongsTo('App\Models\User', 'username', 'receiver');
    }
}

?>