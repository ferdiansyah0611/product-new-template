<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = "productions";
    protected $fillable = ['user_id', 'price', 'description_products', 'mainimg', 'img2', 'img3', 'img4', 'img5', 'category_products', 'status'];
    public function question(){
        return $this->hasMany('App\Models\Question')->orderBy('updated_at', 'ASC');
    }
    public function purchase(){
        return $this->hasMany('App\Models\Purchase')->orderBy('updated_at', 'DESC');
    }
}
