<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function production(){
        return $this->belongsToMany('App\Models\Production');
    }
}
