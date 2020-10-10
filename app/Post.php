<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // A post has a user
    public function user() {
        return $this->belongsTo('App\User');
    }
}
