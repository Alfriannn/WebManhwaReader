{{-- filepath: resources/views/admin/genres/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <a href="{{ route('admin.genres.index') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Daftar Genre
                </a>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Genre</h1>
            <p class="mt-2 text-gray-600">Perbarui informasi genre: <span class="font-semibold text-indigo-600">{{ $genre->name }}</span></p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-amber-50 to-orange-50">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Informasi Genre
                </h2>
            </div>

            <form action="{{ route('admin.genres.update', $genre) }}" method="POST" class="px-8 py-8">
                @csrf
                @method('PUT')
                
                <!-- Current Genre Info -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-600">Genre saat ini: </span>
                        <span class="text-sm font-medium text-gray-900 ml-1">{{ $genre->name }}</span>
                    </div>
                </div>
                
                <!-- Genre Name Field -->
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-3">
                        Nama Genre <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" 
                               id="name"
                               name="name" 
                               required
                               placeholder="Contoh: Action, Drama, Comedy..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all duration-200 placeholder-gray-400 text-gray-900"
                               value="{{ old('name', $genre->name) }}">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="mt-2 text-sm text-gray-500">Ubah nama genre sesuai kebutuhan</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.genres.index') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        
                        <a href="{{ route('admin.genres.show', $genre) }}" 
                           class="inline-flex items-center px-6 py-3 border border-blue-300 rounded-lg text-blue-700 bg-blue-50 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </a>
                    </div>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-lg text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update Genre
                    </button>
                </div>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Warning Notice -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 13.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <div class="text-sm">
                        <p class="font-medium text-yellow-800 mb-1">Perhatian!</p>
                        <p class="text-yellow-700">Mengubah nama genre akan mempengaruhi semua konten yang menggunakan genre ini.</p>
                    </div>
                </div>
            </div>

            <!-- Help Text -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm">
                        <p class="font-medium text-blue-800 mb-1">Tips edit genre:</p>
                        <p class="text-blue-700">Pastikan nama genre tetap konsisten dan mudah dipahami oleh pengguna.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection