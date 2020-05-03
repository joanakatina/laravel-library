<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Author::class);

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
        $this->authorize('create', Author::class);

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
        $this->authorize('create', Author::class);

        //validacija
        $request->validate([
            'first_name' => 'required|alpha|min:2',   // laukas privalomas|galima įvesti tik raides
            'middle_name' => 'nullable|alpha',  // laukas gali būti tuščias|galima įvesti tik raides
            'last_name' => 'required|alpha',
            'gender' => 'required'
        ],[
            //'first_name.required' => 'Vardas yra privalomas laukas.',
            //'first_name.alpha' => 'Vardas gali būti sudarytas tik iš raidžių.'
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
        $this->authorize('show', Author::class);

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
        $this->authorize('edit', Author::class);

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
        $this->authorize('edit', Author::class);

        $request->validate([
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
        $this->authorize('delete', Author::class);

        $author = Author::findOrFail($id);
        $author->delete();  // įvykdoma SQL užklausa, kuri pašalina duomenis iš DB

        return redirect('admin/authors')->with('success', 'Book deleted successfully.');
    }
}
