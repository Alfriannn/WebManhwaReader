{{-- filepath: resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-white mb-8">Daftar Manhwa</h1>
        
        {{-- Search Form --}}
        <form method="GET" action="{{ route('manhwa.index') }}" class="mb-8 flex flex-col sm:flex-row gap-4">
            <input 
                type="text" 
                name="q" 
                value="{{ request('q') }}" 
                placeholder="Cari judul atau author..." 
                class="w-full sm:w-1/3 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500"
            >
            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                Cari
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($manhwas as $manhwa)
                <div class="bg-white/10 rounded-xl p-4 shadow-lg flex flex-col items-center">
                    <a href="{{ route('manhwa.show', $manhwa->id) }}">
                        @if($manhwa->cover_image)
                            <img src="{{ asset('storage/' . $manhwa->cover_image) }}" alt="{{ $manhwa->title }}" class="w-40 h-56 object-cover rounded-lg mb-4">
                        @else
                            <div class="w-40 h-56 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-16 h-16 text-white/80" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold text-white mt-2">{{ $manhwa->title }}</h2>
                        <p class="text-purple-200 text-sm">{{ $manhwa->author }}</p>
                    </a>
                    <div class="flex flex-wrap gap-1 mt-2">
                        @foreach($manhwa->genres as $genre)
                            <span class="px-2 py-1 bg-purple-700 text-white text-xs rounded">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $manhwas->links() }}
        </div>
    </div>
</div>
@endsection