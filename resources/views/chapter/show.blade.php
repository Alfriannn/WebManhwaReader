@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header Section -->
    <div class="bg-black/20 backdrop-blur-sm border-b border-white/10">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('manhwa.show', $chapter->manhwa->id) }}" 
                       class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-all duration-300 flex items-center space-x-2 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
                
                <div class="text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-1">{{ $chapter->title }}</h1>
                    <p class="text-purple-200 text-sm md:text-base">{{ $chapter->manhwa->title }} - Chapter {{ $chapter->chapter_number }}</p>
                </div>
                
                <div class="flex items-center space-x-2">
                    <!-- Reading Mode Toggle -->
                    <button id="readingModeToggle" 
                            class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-all duration-300 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reading Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- PDF Viewer Section -->
        @if($chapter->pdf_path)
            <div class="mb-8">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-purple-600 to-blue-600 p-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Baca PDF
                        </h2>
                    </div>
                    
                    <!-- PDF Viewer -->
                    <div class="p-6">
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                            <iframe 
                                src="{{ asset('storage/' . $chapter->pdf_path) }}"
                                width="100%" 
                                height="800px"
                                style="border: none;"
                                title="{{ $chapter->title }}"
                                class="rounded-xl">
                                <div class="p-8 text-center">
                                    <p class="text-gray-600 mb-4">Browser Anda tidak mendukung PDF viewer.</p>
                                    <a href="{{ asset('storage/' . $chapter->pdf_path) }}" 
                                       target="_blank" 
                                       class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 inline-flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Buka PDF
                                    </a>
                                </div>
                            </iframe>
                        </div>
                        
                        <!-- PDF Actions -->
                        <div class="flex flex-wrap gap-4 mt-6 justify-center">
                            <a href="{{ asset('storage/' . $chapter->pdf_path) }}" 
                               target="_blank" 
                               class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 flex items-center space-x-2 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span>Buka di Tab Baru</span>
                            </a>
                            <a href="{{ asset('storage/' . $chapter->pdf_path) }}" 
                               download="{{ $chapter->title }}.pdf"
                               class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 flex items-center space-x-2 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Download PDF</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Image Pages Section -->
        @if($chapter->pages && $chapter->pages->count() > 0)
            <div class="mb-8">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Baca sebagai Gambar
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-8" id="imageReader">
                        @foreach($chapter->pages as $page)
                            <div class="relative group">
                                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 hover:border-white/30 transition-all duration-300">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/' . $page->image_path) }}" 
                                             alt="Halaman {{ $page->page_number }}" 
                                             class="mx-auto max-w-full h-auto rounded-lg shadow-2xl cursor-pointer transition-transform duration-300 hover:scale-105"
                                             onclick="openImageModal('{{ asset('storage/' . $page->image_path) }}', {{ $page->page_number }})">
                                        <div class="mt-4 flex items-center justify-center space-x-2">
                                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                                                Halaman {{ $page->page_number }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- No Content Warning -->
        @if(!$chapter->pdf_path && (!$chapter->pages || $chapter->pages->count() === 0))
            <div class="bg-gradient-to-r from-yellow-500/20 to-orange-500/20 backdrop-blur-sm border border-yellow-500/30 rounded-2xl p-6 text-center">
                <div class="flex items-center justify-center mb-4">
                    <svg class="w-16 h-16 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-yellow-400 mb-2">Konten Belum Tersedia</h3>
                <p class="text-yellow-200">Chapter ini belum memiliki konten untuk dibaca. Silakan coba lagi nanti.</p>
            </div>
        @endif
    </div>

    <!-- Navigation Footer -->
    <div class="bg-black/20 backdrop-blur-sm border-t border-white/10 sticky bottom-0">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Chapter Navigation -->
                <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                    @if($chapter->chapter_number > 1)
                        @php
                            $prevChapter = $chapter->manhwa->chapters()
                                ->where('chapter_number', $chapter->chapter_number - 1)
                                ->first();
                        @endphp
                        @if($prevChapter)
                            <a href="{{ route('chapter.show', $prevChapter->id) }}" 
                               class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-300 flex items-center space-x-2 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span>Chapter Sebelumnya</span>
                            </a>
                        @endif
                    @endif
                    
                    @php
                        $nextChapter = $chapter->manhwa->chapters()
                            ->where('chapter_number', $chapter->chapter_number + 1)
                            ->first();
                    @endphp
                    @if($nextChapter)
                        <a href="{{ route('chapter.show', $nextChapter->id) }}" 
                           class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 flex items-center space-x-2 shadow-lg">
                            <span>Chapter Selanjutnya</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endif
                </div>

                <!-- Chapter Info -->
                <div class="text-center md:text-right">
                    <p class="text-white/70 text-sm">
                        Chapter {{ $chapter->chapter_number }} dari {{ $chapter->manhwa->chapters->count() }} chapters
                    </p>
                    <div class="w-full bg-white/20 rounded-full h-2 mt-2">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full transition-all duration-300" 
                             style="width: {{ ($chapter->chapter_number / $chapter->manhwa->chapters->count()) * 100 }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-full max-h-full">
        <button onclick="closeImageModal()" 
                class="absolute top-4 right-4 bg-white/20 hover:bg-white/30 text-white p-2 rounded-full transition-all duration-300 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg shadow-2xl">
        <div id="modalCaption" class="text-center mt-4 text-white font-medium"></div>
    </div>
</div>

<script>
// Reading Mode Toggle
document.getElementById('readingModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('reading-mode');
    const isDarkMode = document.body.classList.contains('reading-mode');
    
    if (isDarkMode) {
        document.body.style.backgroundColor = '#1a1a1a';
        document.body.style.color = '#ffffff';
    } else {
        document.body.style.backgroundColor = '';
        document.body.style.color = '';
    }
});

// Image Modal Functions
function openImageModal(src, pageNumber) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');
    
    modalImage.src = src;
    modalImage.alt = `Halaman ${pageNumber}`;
    modalCaption.textContent = `Halaman ${pageNumber}`;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modal when clicking outside
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

// Smooth scroll for better reading experience
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<style>
/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #8b5cf6, #ec4899);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #7c3aed, #db2777);
}

/* Reading mode styles */
.reading-mode {
    background: #1a1a1a !important;
}

.reading-mode .bg-gradient-to-br {
    background: #1a1a1a !important;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    iframe {
        height: 500px;
    }
}

/* Loading animation for images */
img {
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

img.loaded {
    opacity: 1;
}
</style>

<script>
// Image loading animation
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        if (img.complete) {
            img.classList.add('loaded');
        } else {
            img.addEventListener('load', function() {
                this.classList.add('loaded');
            });
        }
    });
});
</script>
@endsection