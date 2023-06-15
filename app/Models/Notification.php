<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;

    public function notified_user(){
        return $this->belongsTo('User', 'username', 'notified_user');
    }

}
?>