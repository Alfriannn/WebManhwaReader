<?php

namespace App\Http\Controllers;

use App\Models\Chapter;

class ChapterController extends Controller
{
    // Baca chapter (tampilkan gambar per halaman)
    public function show($id)
    {
        $chapter = Chapter::with('pages')->findOrFail($id);
        return view('chapter.show', compact('chapter'));
    }
}
