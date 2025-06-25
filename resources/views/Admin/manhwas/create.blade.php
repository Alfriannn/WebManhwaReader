{{-- filepath: resources/views/admin/manhwas/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Tambah Manhwa Baru</h1>
            </div>
            
            <form action="{{ route('admin.manhwas.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                
                {{-- Title Field --}}
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Manhwa <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title"
                        name="title" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        placeholder="Masukkan judul manhwa"
                        value="{{ old('title') }}"
                    >
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Author Field --}}
                <div class="form-group">
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                        Penulis/Author
                    </label>
                    <input 
                        type="text" 
                        id="author"
                        name="author"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        placeholder="Masukkan nama penulis"
                        value="{{ old('author') }}"
                    >
                    @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description Field --}}
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea 
                        id="description"
                        name="description" 
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-vertical"
                        placeholder="Masukkan deskripsi manhwa..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Cover Image Field --}}
                <div class="form-group">
                    <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Cover Image
                    </label>
                    <div class="relative">
                        <input 
                            type="file" 
                            id="cover_image"
                            name="cover_image"
                            accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        >
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WebP. Maksimal 2MB</p>
                    @error('cover_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Genres Field --}}
                <div class="form-group">
                    <label for="genres" class="block text-sm font-medium text-gray-700 mb-2">
                        Genre <span class="text-red-500">*</span>
                    </label>
                    <select 
                        name="genres[]" 
                        id="genres"
                        multiple 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        style="min-height: 120px;"
                    >
                        @foreach(\App\Models\Genre::all() as $genre)
                            <option 
                                value="{{ $genre->id }}"
                                {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}
                                class="py-1"
                            >
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Tahan Ctrl/Cmd untuk memilih multiple genre</p>
                    @error('genres')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a 
                        href="{{ route('admin.manhwas.index') }}" 
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                    >
                        Batal
                    </a>
                    <button 
                        type="submit" 
                        class="px-8 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-medium"
                    >
                        Simpan Manhwa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Custom Styles --}}
<style>
    .form-group {
        animation: fadeInUp 0.3s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    input:focus, textarea:focus, select:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .container {
        animation: slideIn 0.5s ease-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
@endsection