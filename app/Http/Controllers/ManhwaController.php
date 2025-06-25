<?php

namespace App\Http\Controllers;

use App\Models\Manhwa;
use App\Models\Genre;
use Illuminate\Http\Request;

class ManhwaController extends Controller
{
    // Daftar manhwa
    public function index(Request $request)
    {
        $query = Manhwa::with('genres');

        if ($request->has('q') && $request->q) {
            $search = $request->q;
            $query->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
        }

        $manhwas = $query->paginate(12)->withQueryString();
        return view('home', compact('manhwas'));
    }

    // Detail manhwa & daftar chapter
    public function show($id)
    {
        $manhwa = Manhwa::with(['genres', 'chapters'])->findOrFail($id);
        return view('manhwa.show', compact('manhwa'));
    }

    // (Opsional) Filter genre
    public function genre($id)
    {
        $genre = Genre::with('manhwas')->findOrFail($id);
        return view('genre.show', compact('genre'));
    }
}
