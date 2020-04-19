<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authors = Author::all()->sortBy("last_name");   // išrūšiuojam autorius pagal pavardę
        return view('user.authors.index', compact('authors'));
    }
}
