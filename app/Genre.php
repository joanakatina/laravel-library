<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = ['title'];

    public function books()
    {
        return $this->hasMany('App\BookGood');
    }
}
