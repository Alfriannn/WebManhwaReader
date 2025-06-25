{{-- filepath: resources/views/Admin/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <div class="container mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">Dashboard Admin</h1>
            <p class="text-gray-300">Kelola semua konten manhwa dengan mudah</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-300 text-sm">Total Manhwa</p>
                        <p class="text-2xl font-bold text-white">{{ $totalManhwas ?? '0' }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-300 text-sm">Total Genre</p>
                        <p class="text-2xl font-bold text-white">{{ $totalGenres ?? '0' }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-300 text-sm">Total Chapter</p>
                        <p class="text-2xl font-bold text-white">{{ $totalChapters ?? '0' }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-300 text-sm">Total Halaman</p>
                        <p class="text-2xl font-bold text-white">{{ $totalPages ?? '0' }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Kelola Manhwa -->
            <div class="group">
                <a href="{{ route('admin.manhwas.index') }}" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-500/30 transition-colors">
                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Kelola Manhwa</h3>
                            <p class="text-gray-300 text-sm">Tambah, edit, dan hapus manhwa</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kelola Genre -->
            <div class="group">
                <a href="{{ route('admin.genres.index') }}" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-500/30 transition-colors">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Kelola Genre</h3>
                            <p class="text-gray-300 text-sm">Atur kategori dan genre manhwa</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kelola Chapter -->
            <div class="group">
                <a href="{{ route('admin.chapters.index') }}" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-500/30 transition-colors">
                                <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Kelola Chapter</h3>
                            <p class="text-gray-300 text-sm">Upload dan atur chapter manhwa</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kelola Page -->
            <div class="group">
                <a href="{{ route('admin.pages.index') }}" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500/30 transition-colors">
                                <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Kelola Page</h3>
                            <p class="text-gray-300 text-sm">Atur halaman dalam chapter</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                <h2 class="text-xl font-semibold text-white mb-4">Aksi Cepat</h2>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.manhwas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Manhwa Baru
                    </a>
                    <a href="{{ route('admin.genres.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Genre Baru
                    </a>
                    <a href="{{ route('admin.chapters.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Upload Chapter Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .group:hover .group-hover\:scale-105 {
        transform: scale(1.05);
    }
    
    .group:hover .group-hover\:shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
</style>
@endpush
@endsection