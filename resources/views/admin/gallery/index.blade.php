<x-layouts.admin
    title="Galeri Foto Pesantren | Admin Baitul Qur'an Camba"
    breadcrumb="Galeri & Media"
    pageTitle="Galeri Foto Pesantren">

    <div class="space-y-6">

        <!-- Top Header & Action Toolbar -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2.5">
                    <h2 class="text-base font-bold text-slate-900">
                        Koleksi Foto & Galeri
                    </h2>
                    <span id="photo-count-badge" class="px-2.5 py-0.5 rounded-full bg-forest-50 text-forest-900 text-xs font-bold border border-forest-200">
                        {{ $photos->count() }} Foto
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-1">
                    Dokumentasi nyata kegiatan santri, tahfizh 30 juz, asrama, dan fasilitas kampus Baitul Qur'an Camba terkelompok berdasarkan tahun.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <!-- Fast Upload Button -->
                <button type="button" 
                        onclick="openUploadModal()"
                        class="px-4 py-2 rounded-xl bg-[#0B3B2C] hover:bg-[#07261C] text-white text-xs font-bold transition-all shadow-xs inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Unggah Foto</span>
                </button>
            </div>
        </div>

        <!-- Year Filter Bar (Tabs / Capsule Buttons) -->
        <div class="bg-white rounded-2xl p-3 sm:p-4 border border-slate-200/80 shadow-subtle flex items-center justify-between flex-wrap gap-2.5">
            <div class="flex items-center flex-wrap gap-1.5 sm:gap-2">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider mr-1 sm:mr-2">Filter Tahun:</span>
                
                <a href="{{ route('admin.gallery.index') }}" 
                   class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all inline-flex items-center gap-1.5 {{ $selectedYear === 'all' ? 'bg-[#0B3B2C] text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    <span>Semua Tahun</span>
                    <span class="text-[10px] {{ $selectedYear === 'all' ? 'text-amber-300' : 'text-slate-500' }}">({{ $stats['total'] }})</span>
                </a>

                @foreach($years as $yr)
                    <a href="{{ route('admin.gallery.index', ['year' => $yr]) }}" 
                       class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all inline-flex items-center gap-1.5 {{ (string)$selectedYear === (string)$yr ? 'bg-[#0B3B2C] text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        <span>Tahun {{ $yr }}</span>
                        <span class="text-[10px] {{ (string)$selectedYear === (string)$yr ? 'text-amber-300' : 'text-slate-500' }}">
                            ({{ $stats['per_year'][$yr] ?? 0 }})
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="text-xs text-slate-500 font-medium">
                Aktif: <span class="font-bold text-slate-800">{{ $selectedYear === 'all' ? 'Semua Tahun' : 'Tahun '.$selectedYear }}</span>
            </div>
        </div>

        <!-- Pure Photo Gallery Grid (Langsung Foto Saja, Edge-to-edge dengan Badge Tahun) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 sm:gap-4" id="gallery-container">
            
            <!-- Quick Add Photo Tile (Direct File Picker) -->
            <div id="upload-tile"
                 onclick="openUploadModal()" 
                 class="aspect-square rounded-2xl border-2 border-dashed border-slate-300 hover:border-forest-600 hover:bg-forest-50/40 flex flex-col items-center justify-center cursor-pointer transition-all group p-3 text-center bg-white/60 shadow-xs">
                <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0B3B2C] text-slate-400 group-hover:text-amber-300 flex items-center justify-center transition-all mb-2 shadow-xs group-hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-xs font-bold text-slate-700 group-hover:text-forest-900">Tambah Foto</span>
                <span class="text-[10px] text-slate-400 mt-0.5">Single / Multiple</span>
            </div>

            <!-- Loop Photo Cards (Edge-to-Edge Pure Photos) -->
            @forelse($photos as $index => $item)
                @php
                    $isFirstPage = $index < 17;
                @endphp
                <div class="gallery-card group relative aspect-square rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-xs hover:shadow-card transition-all cursor-pointer {{ $isFirstPage ? '' : 'hidden' }}"
                     data-index="{{ $index }}"
                     data-id="{{ $item->id }}"
                     data-src="{{ $item->image_url }}"
                     data-year="{{ $item->year }}"
                     onclick="openLightbox({{ $index }})">
                    
                    <!-- The Pure Photo -->
                    <img src="{{ $item->image_url }}" 
                         alt="Dokumentasi Pondok Camba {{ $item->year }}" 
                         loading="lazy" 
                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-108">

                    <!-- Top Year Badge (Selalu Terlihat) -->
                    <div class="absolute top-2 left-2 z-10 pointer-events-none">
                        <span class="px-2 py-0.5 rounded-lg bg-black/65 backdrop-blur-md text-[10px] font-black text-amber-300 border border-white/20 shadow-xs">
                            {{ $item->year }}
                        </span>
                    </div>

                    <!-- Modern Glassmorphism Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2.5 flex flex-col justify-between z-10">
                        <div></div>

                        <!-- Center Zoom Icon -->
                        <div class="flex items-center justify-center">
                            <div class="w-10 h-10 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 backdrop-blur-md flex items-center justify-center transition-all shadow-md scale-90 group-hover:scale-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Bottom Action Bar (Ganti & Hapus) -->
                        <div class="flex items-center justify-between gap-1 pt-2 border-t border-white/20 text-xs">
                            <button type="button" 
                                    onclick="event.stopPropagation(); triggerReplacePhoto({{ $item->id }})"
                                    class="text-[11px] font-bold text-white hover:text-amber-300 transition-colors flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span>Ganti</span>
                            </button>

                            <button type="button" 
                                    onclick="event.stopPropagation(); deletePhoto({{ $item->id }})"
                                    class="text-[11px] font-bold text-rose-300 hover:text-rose-100 transition-colors flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-dashed border-slate-300">
                    <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-slate-700">Belum ada foto untuk {{ $selectedYear === 'all' ? 'galeri' : 'tahun '.$selectedYear }}.</p>
                    <p class="text-xs text-slate-400 mt-1">Klik tombol "Tambah Foto" di atas untuk mulai mengunggah dokumentasi.</p>
                </div>
            @endforelse

        </div>

        <!-- Gallery Pagination Bar -->
        <div id="gallery-pagination-bar" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="text-xs text-slate-500">
                Menampilkan <span id="pagination-range" class="font-bold text-slate-800">1 - {{ min(17, $photos->count()) }}</span> dari <span id="pagination-total" class="font-bold text-slate-800">{{ $photos->count() }}</span> foto
            </div>

            <!-- Page Number & Navigation Buttons -->
            <div class="flex items-center gap-1.5 self-center sm:self-auto" id="pagination-buttons">
                <!-- Injected dynamically via JavaScript -->
            </div>
        </div>

    </div>

    <!-- Hidden File Input for Direct Replace -->
    <input type="file" id="replace-file-input" class="hidden" accept="image/*" onchange="handleReplaceFile(event)">

    <!-- Lightbox Fullscreen Photo Viewer Modal -->
    <div id="lightbox-modal" 
         class="hidden fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4 select-none"
         onclick="closeLightboxOnBackdrop(event)">
        
        <!-- Top Controls Bar -->
        <div class="absolute top-4 inset-x-4 sm:inset-x-8 flex items-center justify-between text-white z-20">
            <div class="flex items-center gap-2">
                <span id="lightbox-year" class="text-xs font-black tracking-wider px-3 py-1 rounded-full bg-black/60 backdrop-blur-xs text-amber-300 border border-white/20">
                    2026
                </span>
                <span id="lightbox-counter" class="text-xs font-bold tracking-wider px-3 py-1 rounded-full bg-white/10 backdrop-blur-xs text-white">
                    Foto 1 / 30
                </span>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="triggerReplaceFromLightbox()" 
                        class="px-3 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white text-xs font-semibold backdrop-blur-xs transition-colors flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span>Ganti Foto</span>
                </button>

                <button type="button" 
                        onclick="closeLightbox()" 
                        class="p-2 rounded-xl bg-white/15 hover:bg-white/30 text-white transition-colors cursor-pointer"
                        title="Tutup (ESC)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation Prev Button -->
        <button type="button" 
                onclick="event.stopPropagation(); prevPhoto()" 
                class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/15 hover:bg-white/30 text-white flex items-center justify-center transition-all backdrop-blur-xs z-20 cursor-pointer"
                title="Foto Sebelumnya (Panah Kiri)">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <!-- Main Display Photo -->
        <div class="max-w-4xl max-h-[82vh] w-full flex items-center justify-center p-2 z-10" onclick="event.stopPropagation()">
            <img id="lightbox-img" 
                 src="" 
                 alt="Foto Pembesaran" 
                 class="max-w-full max-h-[82vh] object-contain rounded-2xl shadow-2xl transition-all duration-200">
        </div>

        <!-- Navigation Next Button -->
        <button type="button" 
                onclick="event.stopPropagation(); nextPhoto()" 
                class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/15 hover:bg-white/30 text-white flex items-center justify-center transition-all backdrop-blur-xs z-20 cursor-pointer"
                title="Foto Selanjutnya (Panah Kanan)">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Bottom Action Bar -->
        <div class="absolute bottom-4 inset-x-4 flex items-center justify-center gap-3 z-20">
            <a id="lightbox-download-link" 
               href="#" 
               download 
               class="px-4 py-2 rounded-xl bg-white/15 hover:bg-white/25 text-white text-xs font-semibold backdrop-blur-xs transition-colors inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Unduh Foto</span>
            </a>
            <button type="button" 
                    onclick="deletePhotoFromLightbox()" 
                    class="px-4 py-2 rounded-xl bg-rose-600/80 hover:bg-rose-600 text-white text-xs font-semibold backdrop-blur-xs transition-colors inline-flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Hapus Foto</span>
            </button>
        </div>

    </div>

    <!-- Enhanced Fast Upload Modal (Support Single & Multiple Upload with Year Select) -->
    <div id="upload-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border border-slate-100 animate-in fade-in zoom-in-95 duration-200 my-8">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Unggah Foto Galeri</h3>
                        <p class="text-[11px] text-slate-400">Pilih tahun dan unggah 1 foto atau banyak foto sekaligus</p>
                    </div>
                </div>
                <button type="button" onclick="closeUploadModal()" class="p-1.5 text-slate-400 hover:text-slate-600 rounded-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Upload Form -->
            <form id="upload-gallery-form" onsubmit="event.preventDefault(); submitUpload();" class="py-4 space-y-4">
                
                <!-- Year Selection Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" id="year-selection-row">
                    <div id="year-select-wrapper" class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Pilih Tahun Dokumentasi <span class="text-rose-500">*</span>
                        </label>
                        <select id="upload-year-select" 
                                onchange="handleYearSelectChange(this)"
                                class="w-full text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0B3B2C] focus:bg-white transition-all cursor-pointer">
                            @php
                                $defaultYear = $selectedYear !== 'all' ? (int)$selectedYear : (int)date('Y');
                            @endphp
                            @foreach($years as $yr)
                                <option value="{{ $yr }}" {{ $defaultYear === (int)$yr ? 'selected' : '' }}>
                                    Tahun {{ $yr }}
                                </option>
                            @endforeach
                            <option value="custom">+ Input Tahun Baru...</option>
                        </select>
                    </div>

                    <!-- Custom Year Input (Hidden by default) -->
                    <div id="custom-year-container" class="hidden">
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Tuliskan Tahun Baru <span class="text-rose-500">*</span>
                        </label>
                        <input type="number" 
                               id="upload-custom-year" 
                               min="2000" 
                               max="{{ (int)date('Y') + 2 }}" 
                               placeholder="Contoh: 2027"
                               class="w-full text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0B3B2C] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Dropzone Area -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">
                        Pilih Berkas Foto <span class="text-rose-500">*</span>
                    </label>

                    <div id="upload-dropzone" 
                         onclick="document.getElementById('file-upload-input').click()"
                         ondragover="handleDragOver(event)" 
                         ondragleave="handleDragLeave(event)" 
                         ondrop="handleFileDrop(event)"
                         class="border-2 border-dashed border-slate-300 rounded-2xl p-5 text-center hover:border-forest-600 hover:bg-forest-50/40 transition-all cursor-pointer bg-slate-50/50">
                        
                        <input type="file" 
                               id="file-upload-input" 
                               class="hidden" 
                               accept="image/*" 
                               multiple 
                               onchange="handleFileSelect(event)">
                        
                        <!-- Dropzone Default View -->
                        <div id="dropzone-default">
                            <div class="w-12 h-12 rounded-2xl bg-forest-50 text-forest-900 mx-auto flex items-center justify-center mb-2 shadow-2xs">
                                <svg class="h-6 w-6 text-[#0B3B2C]" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-bold text-slate-800">Tarik & letakkan foto di sini, atau <span class="text-forest-900 underline font-extrabold">telusuri</span></p>
                            <p class="mt-1 text-[11px] text-slate-500">Bisa pilih 1 foto atau <strong class="text-slate-700">banyak foto sekaligus (multiple)</strong></p>
                            <p class="mt-1 text-[10px] text-slate-400">Mendukung JPG, PNG, WEBP • Otomatis dikompres & dikonversi ke WebP</p>
                        </div>

                        <!-- Selected Preview Area (Single or Multiple Thumbnails Grid) -->
                        <div id="dropzone-preview" class="hidden text-left">
                            <div class="flex items-center justify-between pb-2 mb-2 border-b border-slate-200">
                                <span id="preview-file-count" class="text-xs font-bold text-slate-800">0 Foto Terpilih</span>
                                <button type="button" 
                                        onclick="event.stopPropagation(); resetUploadFiles();" 
                                        class="text-[11px] text-rose-600 hover:text-rose-800 font-bold">
                                    Ganti Pilihan
                                </button>
                            </div>

                            <!-- Thumbnails Scrollable Container -->
                            <div id="preview-thumbnails-grid" class="grid grid-cols-3 sm:grid-cols-4 gap-2 max-h-48 overflow-y-auto p-1">
                                <!-- Dynamically injected via JS -->
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Actions -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" 
                            onclick="closeUploadModal()" 
                            class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" 
                            id="btn-submit-upload"
                            class="px-5 py-2.5 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span id="btn-submit-text">Simpan Foto</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Custom Modal: Konfirmasi Hapus Foto (Clean Tailwind Modal) -->
    <div id="delete-modal" 
         class="hidden fixed inset-0 z-[60] bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 select-none"
         onclick="closeDeleteModalOnBackdrop(event)">
        <div class="bg-white rounded-2xl max-w-sm w-full p-5 shadow-2xl border border-slate-100 space-y-4 animate-in fade-in zoom-in-95 duration-200"
             onclick="event.stopPropagation()">
            
            <!-- Header Icon & Title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 border border-rose-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 text-sm">Hapus Foto Galeri?</h4>
                    <p class="text-xs text-slate-500 mt-0.5" id="delete-modal-year-text">Dokumentasi Pondok Camba</p>
                </div>
            </div>

            <!-- Mini Preview of Photo to be Deleted -->
            <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-2xs">
                <img id="delete-modal-preview-img" src="" alt="Foto yang akan dihapus" class="w-full h-full object-cover">
                <span id="delete-modal-badge" class="absolute top-2 left-2 px-2 py-0.5 rounded-md bg-black/65 backdrop-blur-xs text-[10px] font-black text-amber-300 border border-white/20">
                    2026
                </span>
            </div>

            <!-- Warning Text -->
            <p class="text-xs text-slate-600 leading-relaxed">
                Tindakan ini akan menghapus foto dari server dan galeri secara permanen. Tindakan ini tidak dapat dibatalkan.
            </p>

            <!-- Actions Buttons -->
            <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" 
                        onclick="closeDeleteModal()" 
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="button" 
                        id="btn-confirm-delete"
                        onclick="executeDeletePhoto()" 
                        class="px-4 py-2 rounded-xl text-xs font-bold bg-rose-600 hover:bg-rose-700 text-white transition-all shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span id="btn-confirm-delete-text">Ya, Hapus Foto</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification Pop-up -->
    <div id="gallery-toast" 
         class="fixed bottom-6 right-6 z-50 transform translate-y-12 opacity-0 transition-all duration-300 pointer-events-none flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#0B3B2C] text-white shadow-xl text-xs font-semibold">
        <span class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </span>
        <span id="toast-message">Operasi berhasil dilakukan.</span>
    </div>

    <!-- Client-side Interactive Script -->
    <x-slot:scripts>
    <script>
        // State
        let galleryCards = [];
        let currentLightboxIndex = 0;
        let replaceTargetPhotoId = null;
        let currentPage = 1;
        let selectedUploadFiles = [];

        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        }

        function refreshGalleryState() {
            galleryCards = Array.from(document.querySelectorAll('.gallery-card'));
        }

        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const initialPage = parseInt(urlParams.get('page'), 10);
            if (initialPage && initialPage > 0) {
                currentPage = initialPage;
            }

            refreshGalleryState();
            renderPagination();

            // Keyboard shortcuts (Escape for modals, arrows for lightbox)
            document.addEventListener('keydown', (e) => {
                const deleteModal = document.getElementById('delete-modal');
                if (deleteModal && !deleteModal.classList.contains('hidden')) {
                    if (e.key === 'Escape') closeDeleteModal();
                    return;
                }

                const uploadModal = document.getElementById('upload-modal');
                if (uploadModal && !uploadModal.classList.contains('hidden')) {
                    if (e.key === 'Escape') closeUploadModal();
                    return;
                }

                const lightbox = document.getElementById('lightbox-modal');
                if (lightbox && !lightbox.classList.contains('hidden')) {
                    if (e.key === 'Escape') closeLightbox();
                    if (e.key === 'ArrowLeft') prevPhoto();
                    if (e.key === 'ArrowRight') nextPhoto();
                }
            });
        });

        function getItemPage(index) {
            if (index < 17) return 1;
            return Math.floor((index - 17) / 18) + 2;
        }

        // Pagination renderer
        function renderPagination() {
            refreshGalleryState();
            const totalItems = galleryCards.length;
            const totalPages = totalItems <= 17 ? 1 : 1 + Math.ceil((totalItems - 17) / 18);

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            // Show or hide cards based on current page
            galleryCards.forEach((card, index) => {
                const itemPage = getItemPage(index);
                if (itemPage === currentPage) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });

            // Show upload tile only on page 1
            const uploadTile = document.getElementById('upload-tile');
            if (uploadTile) {
                if (currentPage === 1) {
                    uploadTile.classList.remove('hidden');
                } else {
                    uploadTile.classList.add('hidden');
                }
            }

            // Update range & total text
            let start = 0;
            let end = 0;
            if (totalItems > 0) {
                if (currentPage === 1) {
                    start = 1;
                    end = Math.min(17, totalItems);
                } else {
                    start = 17 + (currentPage - 2) * 18 + 1;
                    end = Math.min(start + 17, totalItems);
                }
            }
            const rangeEl = document.getElementById('pagination-range');
            const totalEl = document.getElementById('pagination-total');
            if (rangeEl) rangeEl.textContent = `${start} - ${end}`;
            if (totalEl) totalEl.textContent = totalItems;

            // Update pagination buttons
            const btnContainer = document.getElementById('pagination-buttons');
            if (!btnContainer) return;
            btnContainer.innerHTML = '';

            const paginationBar = document.getElementById('gallery-pagination-bar');
            if (totalPages <= 1) {
                if (paginationBar) paginationBar.classList.add('hidden');
                return;
            } else {
                if (paginationBar) paginationBar.classList.remove('hidden');
            }

            // Prev Button
            const prevBtn = document.createElement('button');
            prevBtn.type = 'button';
            prevBtn.className = `px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1 transition-all cursor-pointer ${
                currentPage === 1 
                    ? 'text-slate-300 cursor-not-allowed border border-slate-100 bg-slate-50' 
                    : 'text-slate-700 hover:bg-slate-100 border border-slate-200 bg-white hover:text-slate-900 shadow-xs'
            }`;
            prevBtn.innerHTML = `
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="hidden sm:inline">Sebelumnya</span>
            `;
            prevBtn.disabled = currentPage === 1;
            prevBtn.onclick = () => goToPage(currentPage - 1);
            btnContainer.appendChild(prevBtn);

            // Number Buttons
            for (let p = 1; p <= totalPages; p++) {
                const pageBtn = document.createElement('button');
                pageBtn.type = 'button';
                pageBtn.textContent = p;
                if (p === currentPage) {
                    pageBtn.className = 'w-8 h-8 sm:w-9 sm:h-9 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white shadow-xs cursor-pointer';
                } else {
                    pageBtn.className = 'w-8 h-8 sm:w-9 sm:h-9 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors cursor-pointer';
                }
                pageBtn.onclick = () => goToPage(p);
                btnContainer.appendChild(pageBtn);
            }

            // Next Button
            const nextBtn = document.createElement('button');
            nextBtn.type = 'button';
            nextBtn.className = `px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1 transition-all cursor-pointer ${
                currentPage === totalPages 
                    ? 'text-slate-300 cursor-not-allowed border border-slate-100 bg-slate-50' 
                    : 'text-slate-700 hover:bg-slate-100 border border-slate-200 bg-white hover:text-slate-900 shadow-xs'
            }`;
            nextBtn.innerHTML = `
                <span class="hidden sm:inline">Selanjutnya</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            `;
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.onclick = () => goToPage(currentPage + 1);
            btnContainer.appendChild(nextBtn);
        }

        function goToPage(page) {
            currentPage = page;
            renderPagination();

            const gallerySection = document.getElementById('gallery-container');
            if (gallerySection) {
                gallerySection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            const url = new URL(window.location);
            url.searchParams.set('page', page);
            window.history.pushState({}, '', url);
        }

        // Lightbox functions
        function openLightbox(index) {
            refreshGalleryState();
            currentLightboxIndex = index;
            updateLightboxContent();

            const modal = document.getElementById('lightbox-modal');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function closeLightboxOnBackdrop(e) {
            if (e.target.id === 'lightbox-modal') {
                closeLightbox();
            }
        }

        function updateLightboxContent() {
            const card = galleryCards[currentLightboxIndex];
            if (!card) return;

            const src = card.getAttribute('data-src');
            const year = card.getAttribute('data-year') || '';
            const img = document.getElementById('lightbox-img');
            img.src = src;

            const yearBadge = document.getElementById('lightbox-year');
            if (yearBadge) yearBadge.textContent = year ? `Tahun ${year}` : 'Galeri';

            const counter = document.getElementById('lightbox-counter');
            if (counter) counter.textContent = `Foto ${currentLightboxIndex + 1} / ${galleryCards.length}`;

            const downloadLink = document.getElementById('lightbox-download-link');
            if (downloadLink) downloadLink.href = src;
        }

        function prevPhoto() {
            if (galleryCards.length === 0) return;
            currentLightboxIndex = (currentLightboxIndex - 1 + galleryCards.length) % galleryCards.length;
            updateLightboxContent();
        }

        function nextPhoto() {
            if (galleryCards.length === 0) return;
            currentLightboxIndex = (currentLightboxIndex + 1) % galleryCards.length;
            updateLightboxContent();
        }

        // Replace Photo
        function triggerReplacePhoto(photoId) {
            replaceTargetPhotoId = photoId;
            document.getElementById('replace-file-input').click();
        }

        function triggerReplaceFromLightbox() {
            const card = galleryCards[currentLightboxIndex];
            if (!card) return;
            const photoId = card.getAttribute('data-id');
            if (photoId) {
                triggerReplacePhoto(photoId);
            }
        }

        async function handleReplaceFile(event) {
            const file = event.target.files[0];
            if (!file || !replaceTargetPhotoId) return;

            const formData = new FormData();
            formData.append('photo', file);
            formData.append('_token', getCsrfToken());

            try {
                showToast('Sedang memperbarui foto...');
                const response = await fetch(`/admin/gallery/${replaceTargetPhotoId}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Update image in DOM
                    const card = document.querySelector(`.gallery-card[data-id="${replaceTargetPhotoId}"]`);
                    if (card) {
                        const newUrl = result.data.image_url;
                        const img = card.querySelector('img');
                        img.src = newUrl;
                        card.setAttribute('data-src', newUrl);

                        const lightbox = document.getElementById('lightbox-modal');
                        if (!lightbox.classList.contains('hidden')) {
                            document.getElementById('lightbox-img').src = newUrl;
                        }
                    }

                    showToast('Foto berhasil diganti dengan yang baru!');
                } else {
                    showToast(result.message || 'Gagal mengganti foto.');
                }
            } catch (err) {
                console.error(err);
                showToast('Terjadi kesalahan jaringan saat mengganti foto.');
            } finally {
                event.target.value = '';
                replaceTargetPhotoId = null;
            }
        }

        // Delete Photo Flow via Custom Confirmation Modal
        let pendingDeletePhotoId = null;

        function confirmDeletePhoto(photoId) {
            pendingDeletePhotoId = photoId;
            const card = document.querySelector(`.gallery-card[data-id="${photoId}"]`);
            const previewImg = document.getElementById('delete-modal-preview-img');
            const badge = document.getElementById('delete-modal-badge');
            const yearText = document.getElementById('delete-modal-year-text');

            if (card) {
                const src = card.getAttribute('data-src') || '';
                const year = card.getAttribute('data-year') || '';
                if (previewImg) previewImg.src = src;
                if (badge) badge.textContent = year ? `Tahun ${year}` : 'Galeri';
                if (yearText) yearText.textContent = year ? `Dokumentasi Arsip Tahun ${year}` : 'Dokumentasi Pondok Camba';
            }

            const btnConfirm = document.getElementById('btn-confirm-delete');
            const btnText = document.getElementById('btn-confirm-delete-text');
            if (btnConfirm) btnConfirm.disabled = false;
            if (btnText) btnText.textContent = 'Ya, Hapus Foto';

            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            pendingDeletePhotoId = null;
        }

        function closeDeleteModalOnBackdrop(e) {
            if (e.target.id === 'delete-modal') {
                closeDeleteModal();
            }
        }

        async function executeDeletePhoto() {
            if (!pendingDeletePhotoId) return;

            const photoId = pendingDeletePhotoId;
            const btnConfirm = document.getElementById('btn-confirm-delete');
            const btnText = document.getElementById('btn-confirm-delete-text');

            if (btnConfirm) btnConfirm.disabled = true;
            if (btnText) btnText.textContent = 'Menghapus...';

            try {
                const response = await fetch(`/admin/gallery/${photoId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'Accept': 'application/json',
                    },
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    closeDeleteModal();

                    const card = document.querySelector(`.gallery-card[data-id="${photoId}"]`);
                    if (card) {
                        card.style.transition = 'all 0.3s ease';
                        card.style.transform = 'scale(0.8)';
                        card.style.opacity = '0';

                        setTimeout(() => {
                            card.remove();
                            refreshGalleryState();
                            const countBadge = document.getElementById('photo-count-badge');
                            if (countBadge) countBadge.textContent = `${galleryCards.length} Foto`;

                            renderPagination();
                            closeLightbox();
                            showToast('Foto telah berhasil dihapus dari galeri.');
                        }, 300);
                    }
                } else {
                    showToast(result.message || 'Gagal menghapus foto.');
                    if (btnConfirm) btnConfirm.disabled = false;
                    if (btnText) btnText.textContent = 'Ya, Hapus Foto';
                }
            } catch (err) {
                console.error(err);
                showToast('Terjadi kesalahan koneksi saat menghapus foto.');
                if (btnConfirm) btnConfirm.disabled = false;
                if (btnText) btnText.textContent = 'Ya, Hapus Foto';
            }
        }

        function deletePhoto(photoId) {
            confirmDeletePhoto(photoId);
        }

        function deletePhotoFromLightbox() {
            const card = galleryCards[currentLightboxIndex];
            if (!card) return;
            const photoId = card.getAttribute('data-id');
            if (photoId) {
                confirmDeletePhoto(photoId);
            }
        }

        // Upload Modal Functions
        function openUploadModal() {
            resetUploadForm();
            document.getElementById('upload-modal').classList.remove('hidden');
        }

        function closeUploadModal() {
            document.getElementById('upload-modal').classList.add('hidden');
            resetUploadForm();
        }

        function handleYearSelectChange(selectEl) {
            const customContainer = document.getElementById('custom-year-container');
            const customInput = document.getElementById('upload-custom-year');
            const selectWrapper = document.getElementById('year-select-wrapper');
            if (selectEl.value === 'custom') {
                if (selectWrapper) selectWrapper.classList.remove('sm:col-span-2');
                customContainer.classList.remove('hidden');
                customInput.focus();
            } else {
                if (selectWrapper) selectWrapper.classList.add('sm:col-span-2');
                customContainer.classList.add('hidden');
                customInput.value = '';
            }
        }

        function resetUploadFiles() {
            selectedUploadFiles = [];
            document.getElementById('file-upload-input').value = '';
            document.getElementById('dropzone-default').classList.remove('hidden');
            document.getElementById('dropzone-preview').classList.add('hidden');
            document.getElementById('preview-thumbnails-grid').innerHTML = '';
        }

        function resetUploadForm() {
            resetUploadFiles();
            const yearSelect = document.getElementById('upload-year-select');
            if (yearSelect.options.length > 0 && yearSelect.value === 'custom') {
                yearSelect.selectedIndex = 0;
            }
            const selectWrapper = document.getElementById('year-select-wrapper');
            if (selectWrapper) selectWrapper.classList.add('sm:col-span-2');
            document.getElementById('custom-year-container').classList.add('hidden');
            document.getElementById('upload-custom-year').value = '';

            const btnSubmit = document.getElementById('btn-submit-upload');
            const btnText = document.getElementById('btn-submit-text');
            btnSubmit.disabled = false;
            btnText.textContent = 'Simpan Foto';
        }

        function handleFileSelect(event) {
            const files = Array.from(event.target.files);
            if (files.length > 0) {
                addFilesToSelection(files);
            }
        }

        function handleDragOver(e) {
            e.preventDefault();
            e.currentTarget.classList.add('border-forest-600', 'bg-forest-50/60');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('border-forest-600', 'bg-forest-50/60');
        }

        function handleFileDrop(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('border-forest-600', 'bg-forest-50/60');
            const files = Array.from(e.dataTransfer.files);
            if (files.length > 0) {
                addFilesToSelection(files);
            }
        }

        function addFilesToSelection(newFiles) {
            // Filter only images
            const imageFiles = newFiles.filter(f => f.type.startsWith('image/'));
            if (imageFiles.length === 0) {
                showToast('Silakan pilih berkas format gambar (JPG, PNG, WEBP).');
                return;
            }

            // Append to array
            selectedUploadFiles = selectedUploadFiles.concat(imageFiles);
            renderSelectedPreviews();
        }

        function removeSelectedFile(index) {
            selectedUploadFiles.splice(index, 1);
            if (selectedUploadFiles.length === 0) {
                resetUploadFiles();
            } else {
                renderSelectedPreviews();
            }
        }

        function renderSelectedPreviews() {
            const dropzoneDefault = document.getElementById('dropzone-default');
            const dropzonePreview = document.getElementById('dropzone-preview');
            const countLabel = document.getElementById('preview-file-count');
            const grid = document.getElementById('preview-thumbnails-grid');

            dropzoneDefault.classList.add('hidden');
            dropzonePreview.classList.remove('hidden');
            countLabel.textContent = `${selectedUploadFiles.length} Foto Terpilih`;

            grid.innerHTML = '';

            selectedUploadFiles.forEach((file, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'relative group aspect-square rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-2xs';

                const img = document.createElement('img');
                img.className = 'w-full h-full object-cover';
                img.src = URL.createObjectURL(file);
                itemDiv.appendChild(img);

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute top-1 right-1 w-5 h-5 rounded-full bg-rose-600 text-white flex items-center justify-center text-[10px] font-bold shadow-xs hover:bg-rose-700 cursor-pointer';
                removeBtn.innerHTML = '✕';
                removeBtn.title = 'Hapus foto ini';
                removeBtn.onclick = (e) => {
                    e.stopPropagation();
                    removeSelectedFile(index);
                };
                itemDiv.appendChild(removeBtn);

                grid.appendChild(itemDiv);
            });
        }

        async function submitUpload() {
            if (selectedUploadFiles.length === 0) {
                showToast('Silakan pilih atau tarik setidaknya 1 foto terlebih dahulu.');
                return;
            }

            const yearSelect = document.getElementById('upload-year-select');
            let year = yearSelect.value;
            if (year === 'custom') {
                const customYear = document.getElementById('upload-custom-year').value.trim();
                if (!customYear || isNaN(customYear) || parseInt(customYear, 10) < 2000) {
                    showToast('Silakan masukkan tahun yang valid (contoh: 2027).');
                    return;
                }
                year = customYear;
            }

            const btnSubmit = document.getElementById('btn-submit-upload');
            const btnText = document.getElementById('btn-submit-text');
            btnSubmit.disabled = true;
            btnText.textContent = `Mengunggah ${selectedUploadFiles.length} foto...`;

            const formData = new FormData();
            formData.append('_token', getCsrfToken());
            formData.append('year', year);

            // Append photos (multiple or single)
            selectedUploadFiles.forEach((file) => {
                formData.append('photos[]', file);
            });

            try {
                const response = await fetch('/admin/gallery', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    closeUploadModal();
                    showToast(result.message || 'Foto galeri berhasil diunggah!');
                    
                    // Reload softly or redirect to active year filter to immediately view newly uploaded photos
                    setTimeout(() => {
                        window.location.href = `/admin/gallery?year=${year}`;
                    }, 800);
                } else {
                    showToast(result.message || 'Gagal mengunggah foto. Periksa kembali ukuran dan format file.');
                    btnSubmit.disabled = false;
                    btnText.textContent = 'Simpan Foto';
                }
            } catch (err) {
                console.error(err);
                showToast('Terjadi kesalahan jaringan saat mengunggah foto.');
                btnSubmit.disabled = false;
                btnText.textContent = 'Simpan Foto';
            }
        }

        // Toast Helper
        let toastTimeout = null;
        function showToast(message) {
            const toast = document.getElementById('gallery-toast');
            const toastMsg = document.getElementById('toast-message');
            if (!toast || !toastMsg) return;

            toastMsg.textContent = message;
            toast.classList.remove('opacity-0', 'translate-y-12', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');

            if (toastTimeout) clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.remove('opacity-100', 'translate-y-0');
                toast.classList.add('opacity-0', 'translate-y-12', 'pointer-events-none');
            }, 3500);
        }
    </script>
    </x-slot:scripts>

</x-layouts.admin>
