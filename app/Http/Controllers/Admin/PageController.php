<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Chapter;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::with('chapter.manhwa')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapters = Chapter::with('manhwa')->get();
        return view('admin.pages.create', compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'page_number' => 'required|integer',
            'image_path' => 'required|image',
        ]);
        // Upload gambar
        $data['image_path'] = $request->file('image_path')->store('pages', 'public');
        Page::create($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page berhasil ditambah');
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
    public function edit(Page $page)
    {
        $chapters = Chapter::with('manhwa')->get();
        return view('admin.pages.edit', compact('page', 'chapters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'page_number' => 'required|integer',
            'image_path' => 'nullable|image',
        ]);
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('pages', 'public');
        }
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('success', 'Page berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page berhasil dihapus');
    }
}
