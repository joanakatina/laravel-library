<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();   // naudojam modelį Author; ši eilutė įvykdo SQL užklausą "SELECT * FROM `authors`"
        return view('admin.authors.index', compact('authors'));     // nurodom kokiame vaizde bus atvaizduojami duomenys ir perduodam duomenis (masyvą authors) vaizdui
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacija
        $this->validate($request, [
            'first_name' => 'required|alpha',   // laukas privalomas|galima įvesti tik raides
            'middle_name' => 'nullable|alpha',  // laukas gali būti tuščias
            'last_name' => 'required|alpha',
            'gender' => 'required'
        ]);

        Author::create($request->all());    // išsaugom duomenis DB

        return redirect('admin/authors')->with('success', 'Author added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('admin.authors.form', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|alpha',
            'middle_name' => 'nullable|alpha',
            'last_name' => 'required|alpha',
            'gender' => 'required'
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return redirect('admin/authors')->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return redirect('admin/authors')->with('success', 'Book deleted successfully.');
    }
}
