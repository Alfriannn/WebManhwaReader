<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Manhwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapters = Chapter::with('manhwa')->orderBy('created_at', 'desc')->get();
        return view('admin.chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manhwas = Manhwa::all();
        return view('admin.chapters.create', compact('manhwas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'manhwa_id' => 'required|exists:manhwas,id',
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|integer|min:1',
            'pdf_file' => 'nullable|mimes:pdf|max:204800', // max 200MB, ganti nama field
        ]);

        // Handle PDF upload dengan nama field yang benar
        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            
            // Generate nama file yang unik
            $fileName = 'chapter_' . $data['manhwa_id'] . '_' . $data['chapter_number'] . '_' . time() . '.pdf';
            
            // Store file ke storage/app/public/chapters/pdf/
            $pdfPath = $pdfFile->storeAs('chapters/pdf', $fileName, 'public');
            
            $data['pdf_path'] = $pdfPath;
        }

        // Remove pdf_file dari data karena bukan kolom database
        unset($data['pdf_file']);

        Chapter::create($data);

        return redirect()->route('admin.chapters.index')
            ->with('success', 'Chapter berhasil ditambah dengan PDF');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return view('admin.chapters.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $manhwas = Manhwa::all();
        return view('admin.chapters.edit', compact('chapter', 'manhwas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $data = $request->validate([
            'manhwa_id' => 'required|exists:manhwas,id',
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|integer|min:1',
            'pdf_file' => 'nullable|mimes:pdf|max:204800', // PDF baru (opsional)
        ]);

        // Handle PDF upload baru (jika ada)
        if ($request->hasFile('pdf_file')) {
            // Hapus PDF lama jika ada
            if ($chapter->pdf_path && Storage::disk('public')->exists($chapter->pdf_path)) {
                Storage::disk('public')->delete($chapter->pdf_path);
            }

            // Upload PDF baru
            $pdfFile = $request->file('pdf_file');
            $fileName = 'chapter_' . $data['manhwa_id'] . '_' . $data['chapter_number'] . '_' . time() . '.pdf';
            $pdfPath = $pdfFile->storeAs('chapters/pdf', $fileName, 'public');
            
            $data['pdf_path'] = $pdfPath;
        }

        // Remove pdf_file dari data
        unset($data['pdf_file']);

        $chapter->update($data);

        return redirect()->route('admin.chapters.index')
            ->with('success', 'Chapter berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        // Hapus PDF file jika ada
        if ($chapter->pdf_path && Storage::disk('public')->exists($chapter->pdf_path)) {
            Storage::disk('public')->delete($chapter->pdf_path);
        }

        // Hapus pages jika ada
        if ($chapter->pages) {
            foreach ($chapter->pages as $page) {
                if ($page->image_path && Storage::disk('public')->exists($page->image_path)) {
                    Storage::disk('public')->delete($page->image_path);
                }
            }
        }

        $chapter->delete();

        return redirect()->route('admin.chapters.index')
            ->with('success', 'Chapter dan file terkait berhasil dihapus');
    }
}