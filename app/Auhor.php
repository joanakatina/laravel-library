<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auhor extends Model
{
    protected $table = 'authors';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'gender'];

    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_authors', 'author_id', 'book_id');
    }
}
