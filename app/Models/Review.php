<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'r_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    public function post_info(){
        return $this->belongsTo('Post', 'r_id', 'id');
    }

}
?>