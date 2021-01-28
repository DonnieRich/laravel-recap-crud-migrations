<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $fillable = ['title'];

    public function songs() {
       return $this->hasMany('App\Song');
    }
}
