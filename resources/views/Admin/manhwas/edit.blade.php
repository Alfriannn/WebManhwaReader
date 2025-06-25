{{-- filepath: resources/views/admin/manhwas/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <!-- Header Section -->
    <div class="bg-black/20 backdrop-blur-sm border-b border-white/10">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.manhwas.index') }}" 
                       class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition-all duration-300 flex items-center space-x-2 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span>Kembali</span>
                    </a>
                </div>
                
                <div class="text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-1">Edit Manhwa</h1>
                    <p class="text-purple-200 text-sm md:text-base">Perbarui informasi manhwa</p>
                </div>
                
                <div class="w-20"></div> <!-- Spacer for center alignment -->
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Form Card -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-purple-600 to-blue-600 p-6">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Form Edit Manhwa
                    </h2>
                    <p class="text-purple-100 mt-2">Lengkapi informasi di bawah untuk memperbarui manhwa</p>
                </div>

                <form action="{{ route('admin.manhwas.update', $manhwa) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Title Field -->
                            <div class="space-y-2">
                                <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2M7 4h10M7 4v16a2 2 0 002 2h6a2 2 0 002-2V4M11 8h2M11 12h2M11 16h2"></path>
                                    </svg>
                                    Judul Manhwa *
                                </label>
                                <input type="text" 
                                       name="title" 
                                       value="{{ old('title', $manhwa->title) }}" 
                                       required
                                       class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all duration-300"
                                       placeholder="Masukkan judul manhwa">
                                @error('title')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Author Field -->
                            <div class="space-y-2">
                                <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Penulis
                                </label>
                                <input type="text" 
                                       name="author" 
                                       value="{{ old('author', $manhwa->author) }}"
                                       class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all duration-300"
                                       placeholder="Masukkan nama penulis">
                                @error('author')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Genre Field -->
                            <div class="space-y-2">
                                <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.022.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Genre *
                                </label>
                                <div class="relative">
                                    <select name="genres[]" 
                                            multiple 
                                            required
                                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all duration-300"
                                            style="min-height: 120px;">
                                        @foreach(\App\Models\Genre::all() as $genre)
                                            <option value="{{ $genre->id }}" 
                                                    class="bg-slate-800 text-white py-2 px-3"
                                                    {{ $manhwa->genres->contains($genre->id) ? 'selected' : '' }}>
                                                {{ $genre->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="text-purple-200 text-xs">Tahan Ctrl (Windows) atau Cmd (Mac) untuk memilih beberapa genre</p>
                                @error('genres')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Current Cover Preview -->
                            @if($manhwa->cover_image)
                                <div class="space-y-2">
                                    <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                                        Cover Saat Ini
                                    </label>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm border border-white/20">
                                        <img src="{{ asset('storage/' . $manhwa->cover_image) }}" 
                                             alt="Current Cover" 
                                             class="w-full max-w-xs mx-auto rounded-lg shadow-lg">
                                    </div>
                                </div>
                            @endif

                            <!-- Cover Upload Field -->
                            <div class="space-y-2">
                                <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $manhwa->cover_image ? 'Ganti Cover' : 'Upload Cover' }}
                                </label>
                                <div class="border-2 border-dashed border-white/30 rounded-lg p-6 text-center hover:border-white/50 transition-colors duration-300 bg-white/5 backdrop-blur-sm">
                                    <input type="file" 
                                           name="cover_image" 
                                           id="cover_image"
                                           accept="image/*"
                                           class="hidden"
                                           onchange="previewImage(event)">
                                    <label for="cover_image" class="cursor-pointer">
                                        <svg class="w-12 h-12 text-white/50 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-white/70">Klik untuk upload gambar</p>
                                        <p class="text-white/50 text-sm mt-1">PNG, JPG, GIF hingga 10MB</p>
                                    </label>
                                </div>
                                <div id="imagePreview" class="mt-4 hidden">
                                    <img id="preview" src="" alt="Preview" class="w-full max-w-xs mx-auto rounded-lg shadow-lg">
                                </div>
                                @error('cover_image')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Description Field (Full Width) -->
                    <div class="space-y-2">
                        <label class="block text-white font-semibold text-sm uppercase tracking-wide">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Deskripsi
                        </label>
                        <textarea name="description" 
                                  rows="6"
                                  class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all duration-300 resize-none"
                                  placeholder="Masukkan deskripsi manhwa...">{{ old('description', $manhwa->description) }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-white/10">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold py-4 px-8 rounded-lg hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Update Manhwa</span>
                        </button>
                        
                        <a href="{{ route('admin.manhwas.index') }}" 
                           class="flex-1 bg-white/10 hover:bg-white/20 text-white font-semibold py-4 px-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-300 flex items-center justify-center space-x-2 backdrop-blur-sm border border-white/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-500/20 to-purple-500/20 backdrop-blur-sm border border-blue-500/30 rounded-2xl p-6">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-blue-300 mb-2">Tips Mengisi Form</h3>
                        <ul class="text-blue-100 space-y-1 text-sm">
                            <li>• Judul harus unik dan menarik</li>
                            <li>• Genre dapat dipilih lebih dari satu dengan menekan Ctrl/Cmd</li>
                            <li>• Cover image sebaiknya berformat JPG/PNG dengan rasio 3:4</li>
                            <li>• Deskripsi yang menarik akan meningkatkan minat pembaca</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Image preview functionality
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
}

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const title = document.querySelector('input[name="title"]').value.trim();
    const genres = document.querySelector('select[name="genres[]"]').selectedOptions;
    
    if (!title) {
        e.preventDefault();
        alert('Judul manhwa wajib diisi!');
        return;
    }
    
    if (genres.length === 0) {
        e.preventDefault();
        alert('Pilih minimal satu genre!');
        return;
    }
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = `
        <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Memproses...
    `;
    submitBtn.disabled = true;
});

// Auto-resize textarea
document.querySelector('textarea[name="description"]').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});

// Enhanced multi-select styling
document.addEventListener('DOMContentLoaded', function() {
    const select = document.querySelector('select[name="genres[]"]');
    
    // Add custom styling for selected options
    select.addEventListener('change', function() {
        const selectedCount = this.selectedOptions.length;
        const label = document.querySelector('label[for="genres"]');
        if (selectedCount > 0) {
            // You can add custom feedback here if needed
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

/* Multi-select styling */
select[multiple] option {
    padding: 8px 12px;
    margin: 2px 0;
    border-radius: 4px;
}

select[multiple] option:checked {
    background: linear-gradient(to right, #8b5cf6, #ec4899);
    color: white;
}

/* Form animations */
.form-group {
    animation: slideInUp 0.6s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Loading animation */
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Focus states */
input:focus, textarea:focus, select:focus {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
}

/* Hover effects */
.form-card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .grid-cols-1.lg\\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection