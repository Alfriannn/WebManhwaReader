{{-- filepath: resources/views/admin/chapters/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <a href="{{ route('admin.chapters.index') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Daftar Chapter
                </a>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                <svg class="w-8 h-8 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Chapter
            </h1>
            <p class="mt-2 text-gray-600">
                Perbarui informasi chapter: 
                <span class="font-semibold text-purple-600">{{ $chapter->title }}</span>
                <span class="text-gray-400 mx-2">•</span>
                <span class="text-sm text-gray-500">Ch. {{ $chapter->chapter_number }}</span>
            </p>
        </div>

        <!-- Current Chapter Info -->
        <div class="mb-8 bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Informasi Chapter Saat Ini
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg p-4 border border-purple-100">
                    <p class="text-sm text-gray-600 mb-1">Manhwa</p>
                    <p class="font-medium text-gray-900">{{ $chapter->manhwa->title }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border border-purple-100">
                    <p class="text-sm text-gray-600 mb-1">Judul Chapter</p>
                    <p class="font-medium text-gray-900">{{ $chapter->title }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 border border-purple-100">
                    <p class="text-sm text-gray-600 mb-1">Nomor Chapter</p>
                    <p class="font-medium text-gray-900">Ch. {{ $chapter->chapter_number }}</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Edit Informasi Chapter
                </h2>
            </div>

            <form action="{{ route('admin.chapters.update', $chapter) }}" method="POST" class="px-8 py-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Manhwa Selection -->
                        <div>
                            <label for="manhwa_id" class="block text-sm font-medium text-gray-700 mb-3">
                                Manhwa <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="manhwa_id" 
                                        id="manhwa_id"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-gray-900 bg-white appearance-none"
                                        onchange="updateGenres(this)">
                                    <option value="">Pilih Manhwa...</option>
                                    @foreach($manhwas as $manhwa)
                                        <option value="{{ $manhwa->id }}" 
                                                {{ $chapter->manhwa_id == $manhwa->id ? 'selected' : '' }}
                                                data-genres="{{ $manhwa->genres->pluck('name')->implode(', ') }}">
                                            {{ $manhwa->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('manhwa_id')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Chapter Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-3">
                                Judul Chapter <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="title"
                                       name="title" 
                                       required
                                       placeholder="Contoh: The Beginning, Final Battle..."
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 placeholder-gray-400 text-gray-900"
                                       value="{{ old('title', $chapter->title) }}">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">Berikan judul yang menarik untuk chapter ini</p>
                        </div>

                        <!-- Chapter Number -->
                        <div>
                            <label for="chapter_number" class="block text-sm font-medium text-gray-700 mb-3">
                                Nomor Chapter <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       id="chapter_number"
                                       name="chapter_number" 
                                       required
                                       min="1"
                                       placeholder="1"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 placeholder-gray-400 text-gray-900"
                                       value="{{ old('chapter_number', $chapter->chapter_number) }}">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('chapter_number')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">Nomor urut chapter dalam seri manhwa</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Genre Display -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Genre Manhwa
                                <svg class="w-4 h-4 inline ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </label>
                            <div class="min-h-[120px] p-4 border border-gray-300 rounded-lg bg-gray-50" id="genreDisplay">
                                <div class="flex flex-wrap gap-2" id="genreList">
                                    @if($chapter->manhwa->genres->count() > 0)
                                        @foreach($chapter->manhwa->genres as $genre)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                                {{ $genre->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <p class="text-gray-500 text-sm italic">Pilih manhwa untuk melihat genre</p>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Genre otomatis ditampilkan berdasarkan manhwa yang dipilih</p>
                        </div>

                        <!-- Chapter Info -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm">
                                    <p class="font-medium text-blue-800 mb-1">Informasi Penting</p>
                                    <ul class="list-disc list-inside space-y-1 text-blue-700">
                                        <li>Pastikan nomor chapter unik dalam satu manhwa</li>
                                        <li>Judul chapter yang baik akan menarik pembaca</li>
                                        <li>Perubahan akan mempengaruhi urutan reading</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.chapters.index') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        
                    </div>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-lg text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update Chapter
                    </button>
                </div>
            </form>
        </div>

        <!-- Warning Notice -->
        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex">
                <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 13.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <div class="text-sm">
                    <p class="font-medium text-yellow-800 mb-1">Perhatian!</p>
                    <p class="text-yellow-700">Mengubah informasi chapter akan mempengaruhi pengalaman membaca pengguna. Pastikan semua informasi sudah benar sebelum menyimpan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateGenres(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const genres = selectedOption.getAttribute('data-genres');
    const genreList = document.getElementById('genreList');
    
    if (genres && genres.trim() !== '') {
        const genreArray = genres.split(', ').filter(genre => genre.trim() !== '');
        genreList.innerHTML = genreArray.map(genre => `
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                ${genre}
            </span>
        `).join('');
    } else {
        genreList.innerHTML = '<p class="text-gray-500 text-sm italic">Manhwa ini belum memiliki genre</p>';
    }
}
</script>
@endsection