<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function get_author(){
        return $this->belongsTo('App\Models\User', 'author', 'username');
    }
}

?>