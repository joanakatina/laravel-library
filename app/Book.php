<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'description', 'isbn', 'year', 'pages', 'price', 'publisher_id', 'genre_id'];

    public function publisher()
    {
        return $this->belongsTo('App\Publisher')->withDefault();
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre')->withDefault();
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'books_authors', 'book_id', 'author_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'orders', 'book_id', 'user_id');
    }
}
