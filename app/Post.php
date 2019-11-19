<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //defining the relationship

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
