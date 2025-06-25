{{-- filepath: resources/views/manhwa/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative container mx-auto px-4 py-16">
            <div class="grid lg:grid-cols-3 gap-8 items-start">
                <!-- Cover Image -->
                <div class="lg:col-span-1">
                    <div class="relative group">
                        @if($manhwa->cover_image)
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl transform group-hover:scale-105 transition-transform duration-300">
                                <img src="{{ asset('storage/' . $manhwa->cover_image) }}" 
                                     alt="{{ $manhwa->title }}" 
                                     class="w-full h-auto object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                        @else
                            <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl aspect-[3/4] flex items-center justify-center shadow-2xl">
                                <svg class="w-24 h-24 text-white/50" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Manhwa Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Title -->
                    <div>
                        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                            {{ $manhwa->title }}
                        </h1>
                        <div class="flex items-center space-x-4 text-gray-300">
                            <span class="bg-purple-600/20 px-3 py-1 rounded-full text-sm font-medium">
                                Manhwa
                            </span>
                            <span class="text-sm">
                                By {{ $manhwa->author }}
                            </span>
                        </div>
                    </div>

                    <!-- Genres -->
                    <div class="space-y-2">
                        <h3 class="text-lg font-semibold text-white">Genres</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($manhwa->genres as $genre)
                                <a href="{{ route('genre.show', $genre->id) }}" 
                                   class="bg-gradient-to-r from-pink-500 to-violet-500 hover:from-pink-600 hover:to-violet-600 
                                          px-4 py-2 rounded-full text-white text-sm font-medium 
                                          transform hover:scale-105 transition-all duration-200 shadow-lg">
                                    {{ $genre->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h3 class="text-lg font-semibold text-white">Synopsis</h3>
                        <p class="text-gray-300 leading-relaxed text-lg">
                            {{ $manhwa->description }}
                        </p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <div class="text-2xl font-bold text-white">{{ $manhwa->chapters->count() }}</div>
                            <div class="text-gray-400 text-sm">Total Chapters</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <div class="text-2xl font-bold text-white">{{ $manhwa->genres->count() }}</div>
                            <div class="text-gray-400 text-sm">Genres</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chapters Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-white">Chapters</h2>
                <div class="text-gray-400 text-sm">
                    {{ $manhwa->chapters->count() }} chapters available
                </div>
            </div>

            @if($manhwa->chapters->count() > 0)
                <div class="grid gap-4">
                    @foreach($manhwa->chapters->sortBy('chapter_number') as $chapter)
                        <a href="{{ route('chapter.show', $chapter->id) }}" 
                           class="group block bg-white/5 hover:bg-white/10 rounded-xl p-6 border border-white/10 
                                  hover:border-purple-500/50 transition-all duration-300 transform hover:scale-[1.02]">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                            Ch. {{ $chapter->chapter_number }}
                                        </span>
                                        <h3 class="text-white font-semibold text-lg group-hover:text-purple-400 transition-colors">
                                            {{ $chapter->title }}
                                        </h3>
                                    </div>
                                    @if($chapter->created_at)
                                        <p class="text-gray-400 text-sm">
                                            Released {{ $chapter->created_at->diffForHumans() }}
                                        </p>
                                    @endif
                                </div>
                                <div class="text-purple-400 group-hover:text-purple-300 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 text-lg mb-4">No chapters available yet</div>
                    <p class="text-gray-500">Check back later for new chapters!</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Back Button -->
    <div class="container mx-auto px-4 pb-8">
        <a href="{{ route('manhwa.index') }}" 
           class="inline-flex items-center space-x-2 bg-white/10 hover:bg-white/20 
                  backdrop-blur-sm rounded-xl px-6 py-3 text-white 
                  border border-white/20 hover:border-white/30 
                  transition-all duration-300 transform hover:scale-105">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Back to Manhwa List</span>
        </a>
    </div>
</div>

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #581c87 50%, #0f172a 100%);
        min-height: 100vh;
    }
</style>
@endpush
@endsection