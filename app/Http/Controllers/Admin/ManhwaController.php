<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manhwa;
use Illuminate\Http\Request;

class ManhwaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manhwas = Manhwa::all();
        return view('admin.manhwas.index', compact('manhwas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manhwas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'nullable',
            'description' => 'nullable',
            'cover_image' => 'nullable|image',
            // ...field lain...
        ]);
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $manhwa = Manhwa::create($data);
        $manhwa->genres()->sync($request->genres); // <-- ini point B
        return redirect()->route('admin.manhwas.index')->with('success', 'Manhwa berhasil ditambah');
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
    public function edit(Manhwa $manhwa)
    {
        return view('admin.manhwas.edit', compact('manhwa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manhwa $manhwa)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'nullable',
            'description' => 'nullable',
            'cover_image' => 'nullable|image',
            // ...field lain...
        ]);
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $manhwa->update($data);
        $manhwa->genres()->sync($request->genres); // <-- ini point B
        return redirect()->route('admin.manhwas.index')->with('success', 'Manhwa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manhwa $manhwa)
    {
        $manhwa->delete();
        return redirect()->route('admin.manhwas.index')->with('success', 'Manhwa berhasil dihapus');
    }
}
