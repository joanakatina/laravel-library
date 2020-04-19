<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';
    protected $fillable = ['title', 'website'];

    public function books()
    {
        return $this->hasMany('App\BookGood');
    }
}
