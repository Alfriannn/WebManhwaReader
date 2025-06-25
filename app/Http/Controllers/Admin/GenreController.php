<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:genres,name',
        ]);
        Genre::create($data);
        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $data = $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id,
        ]);
        $genre->update($data);
        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil dihapus');
    }
}
