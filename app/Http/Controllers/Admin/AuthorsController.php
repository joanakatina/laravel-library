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
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
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

        Author::create($request->all());    // įvykdoma SQL užklausa, kuri išsaugo duomenis lentelėje

        // grįžtama į nuorodą 'admin/authors'; sesijoje išsaugome pranešimą 'success', kurio reikšmė yra tekstas 'Author added successfully.'
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
        $author = Author::findOrFail($id);  // įvykdoma SQL užklausa, kuri išrenka vieną įrašą iš lentelės pagal ID reikšmę
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
        $author->update($request->all());   // įvykdoma SQL užklausa, kuri atnaujina duomenis DB

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
        $author->delete();  // įvykdoma SQL užklausa, kuri pašalina duomenis iš DB

        return redirect('admin/authors')->with('success', 'Book deleted successfully.');
    }
}
