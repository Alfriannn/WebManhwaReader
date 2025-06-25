{{-- filepath: resources/views/Admin/chapters/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Chapter</h1>
    
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.chapters.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf
        
        <div class="mb-4">
            <label for="manhwa_id" class="block text-sm font-medium text-gray-700 mb-2">Manhwa:</label>
            <select name="manhwa_id" id="manhwa_id" required class="w-full p-2 border border-gray-300 rounded-md">
                <option value="">--Pilih Manhwa--</option>
                @foreach($manhwas as $manhwa)
                    <option value="{{ $manhwa->id }}" {{ old('manhwa_id') == $manhwa->id ? 'selected' : '' }}>
                        {{ $manhwa->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Chapter:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                   class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="chapter_number" class="block text-sm font-medium text-gray-700 mb-2">Nomor Chapter:</label>
            <input type="number" name="chapter_number" id="chapter_number" value="{{ old('chapter_number') }}" 
                   min="1" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-6">
            <label for="pdf_file" class="block text-sm font-medium text-gray-700 mb-2">Upload PDF:</label>
            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" 
                   class="w-full p-2 border border-gray-300 rounded-md">
            <p class="text-sm text-gray-500 mt-1">Max file size: 200MB. Format: PDF</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Genre:</label>
            <select name="genres[]" multiple required class="w-full p-2 border border-gray-300 rounded-md">
                @foreach(\App\Models\Genre::all() as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Simpan Chapter
            </button>
            <a href="{{ route('admin.chapters.index') }}" 
               class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection