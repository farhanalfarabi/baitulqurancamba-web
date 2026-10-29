<x-layouts.admin
    title="Galeri Foto Pesantren | Admin Baitul Qur'an Camba"
    breadcrumb="Galeri & Media"
    pageTitle="Galeri Foto Pesantren">

    @php
        $photos = [
            ['id' => 1, 'src' => '/assets/images/pondok/halaqah-tahfidz.jpg'],
            ['id' => 2, 'src' => '/assets/images/pondok/pidato-3-bahasa.jpg'],
            ['id' => 3, 'src' => '/assets/images/pondok/taklim-kitab-kuning.jpg'],
            ['id' => 4, 'src' => '/assets/images/pondok/tarbiah.jpg'],
            ['id' => 5, 'src' => '/assets/images/pondok/leadership.jpg'],
            ['id' => 6, 'src' => '/assets/images/pondok/masjid.jpg'],
            ['id' => 7, 'src' => '/assets/images/pondok/halaqah-tahfidz-2.jpg'],
            ['id' => 8, 'src' => '/assets/images/pondok/suasana-kelas.jpg'],
            ['id' => 9, 'src' => '/assets/images/pondok/suasana-kelas-2.jpg'],
            ['id' => 10, 'src' => '/assets/images/pondok/kelas.jpg'],
            ['id' => 11, 'src' => '/assets/images/pondok/taklim-kitab-kuning-2.jpg'],
            ['id' => 12, 'src' => '/assets/images/pondok/taklim-kitab-kuning-3.jpg'],
            ['id' => 13, 'src' => '/assets/images/pondok/tarbiah-2.jpg'],
            ['id' => 14, 'src' => '/assets/images/pondok/leadership-2.jpg'],
            ['id' => 15, 'src' => '/assets/images/pondok/leadership-3.jpg'],
            ['id' => 16, 'src' => '/assets/images/pondok/eskul-futsal.jpg'],
            ['id' => 17, 'src' => '/assets/images/pondok/eskul-keterampilan-dakwah.jpg'],
            ['id' => 18, 'src' => '/assets/images/pondok/eskul-takraw.jpg'],
            ['id' => 19, 'src' => '/assets/images/pondok/eskul-takraw-2.jpg'],
            ['id' => 20, 'src' => '/assets/images/pondok/eskul-volly.jpg'],
            ['id' => 21, 'src' => '/assets/images/pondok/upacara.jpg'],
            ['id' => 22, 'src' => '/assets/images/pondok/upacara-2.jpg'],
            ['id' => 23, 'src' => '/assets/images/pondok/masjid-2.jpg'],
            ['id' => 24, 'src' => '/assets/images/pondok/asrama.jpg'],
            ['id' => 25, 'src' => '/assets/images/pondok/gazebo.jpg'],
            ['id' => 26, 'src' => '/assets/images/pondok/kantor.jpg'],
            ['id' => 27, 'src' => '/assets/images/pondok/rumah-tamu.jpg'],
            ['id' => 28, 'src' => '/assets/images/pondok/rumah-tamu-2.jpg'],
            ['id' => 29, 'src' => '/assets/images/pondok/uks.jpg'],
            ['id' => 30, 'src' => '/assets/images/pondok/toilet.jpg'],
            ['id' => 31, 'src' => '/assets/images/prestasi/juara (1).webp'],
            ['id' => 32, 'src' => '/assets/images/prestasi/juara (2).webp'],
            ['id' => 33, 'src' => '/assets/images/prestasi/juara (3).webp'],
            ['id' => 34, 'src' => '/assets/images/prestasi/tasmi (1).webp'],
            ['id' => 35, 'src' => '/assets/images/prestasi/tasmi (2).webp'],
        ];
    @endphp

    <div class="space-y-6">

        <!-- Top Header & Action Toolbar -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2.5">
                    <h2 class="text-base font-bold text-slate-900">
                        Koleksi Foto & Galeri
                    </h2>
                    <span id="photo-count-badge" class="px-2.5 py-0.5 rounded-full bg-forest-50 text-forest-900 text-xs font-bold border border-forest-200">
                        {{ count($photos) }} Foto
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-1">
                    Visual murni langsung foto tanpa judul. Arahkan kursor atau klik foto untuk melihat ukuran penuh, mengganti, atau menghapus foto.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <!-- Fast Upload Button -->
                <button type="button" 
                        onclick="openUploadModal()"
                        class="px-4 py-2 rounded-xl bg-[#0B3B2C] hover:bg-[#07261C] text-white text-xs font-bold transition-all shadow-xs inline-flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Unggah Foto</span>
                </button>
            </div>
        </div>

        <!-- Pure Photo Gallery Grid (Langsung Foto Saja, Tanpa Title / Badge / Bintang) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 sm:gap-4" id="gallery-container">
            
            <!-- Quick Add Photo Tile (Direct File Picker) -->
            <div id="upload-tile"
                 onclick="openUploadModal()" 
                 class="aspect-square rounded-2xl border-2 border-dashed border-slate-300 hover:border-forest-600 hover:bg-forest-50/40 flex flex-col items-center justify-center cursor-pointer transition-all group p-3 text-center bg-white/60">
                <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0B3B2C] text-slate-400 group-hover:text-amber-300 flex items-center justify-center transition-all mb-2 shadow-xs group-hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-xs font-bold text-slate-700 group-hover:text-forest-900">Tambah Foto</span>
                <span class="text-[10px] text-slate-400 mt-0.5">Langsung Unggah</span>
            </div>

            <!-- Loop Photo Cards (Edge-to-Edge Pure Photos) -->
            @foreach($photos as $index => $item)
                @php
                    $isFirstPage = $index < 17;
                @endphp
                <div class="gallery-card group relative aspect-square rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-xs hover:shadow-card transition-all cursor-pointer {{ $isFirstPage ? '' : 'hidden' }}"
                     data-index="{{ $index }}"
                     data-id="{{ $item['id'] }}"
                     data-src="{{ asset($item['src']) }}"
                     onclick="openLightbox({{ $index }})">
                    
                    <!-- The Pure Photo -->
                    <img src="{{ asset($item['src']) }}" 
                         alt="Foto Dokumentasi Pondok" 
                         loading="lazy" 
                         class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-108">

                    <!-- Modern Glassmorphism Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2.5 flex flex-col justify-between z-10">
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
                                    onclick="event.stopPropagation(); triggerReplacePhoto({{ $index }})"
                                    class="text-[11px] font-bold text-white hover:text-amber-300 transition-colors flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span>Ganti</span>
                            </button>

                            <button type="button" 
                                    onclick="event.stopPropagation(); deletePhoto({{ $index }})"
                                    class="text-[11px] font-bold text-rose-300 hover:text-rose-100 transition-colors flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Gallery Pagination Bar -->
        <div id="gallery-pagination-bar" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="text-xs text-slate-500">
                Menampilkan <span id="pagination-range" class="font-bold text-slate-800">1 - 17</span> dari <span id="pagination-total" class="font-bold text-slate-800">{{ count($photos) }}</span> foto
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
            <span id="lightbox-counter" class="text-xs font-bold tracking-wider px-3 py-1 rounded-full bg-white/10 backdrop-blur-xs text-white">
                Foto 1 / 30
            </span>

            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="triggerReplaceFromLightbox()" 
                        class="px-3 py-1.5 rounded-xl bg-white/15 hover:bg-white/25 text-white text-xs font-semibold backdrop-blur-xs transition-colors flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span>Ganti Foto</span>
                </button>

                <button type="button" 
                        onclick="closeLightbox()" 
                        class="p-2 rounded-xl bg-white/15 hover:bg-white/30 text-white transition-colors"
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
                class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/15 hover:bg-white/30 text-white flex items-center justify-center transition-all backdrop-blur-xs z-20"
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
                class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/15 hover:bg-white/30 text-white flex items-center justify-center transition-all backdrop-blur-xs z-20"
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
                    onclick="deletePhoto(currentLightboxIndex)" 
                    class="px-4 py-2 rounded-xl bg-rose-600/80 hover:bg-rose-600 text-white text-xs font-semibold backdrop-blur-xs transition-colors inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Hapus Foto</span>
            </button>
        </div>

    </div>

    <!-- Direct Fast Upload Modal (No Title Required!) -->
    <div id="upload-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-100 animate-in fade-in zoom-in-95 duration-200">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Unggah Foto Langsung</h3>
                </div>
                <button type="button" onclick="closeUploadModal()" class="p-1.5 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="py-5">
                <!-- Dropzone Area -->
                <div id="upload-dropzone" 
                     onclick="document.getElementById('file-upload-input').click()"
                     ondragover="handleDragOver(event)" 
                     ondragleave="handleDragLeave(event)" 
                     ondrop="handleFileDrop(event)"
                     class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center hover:border-forest-600 hover:bg-forest-50/40 transition-all cursor-pointer bg-slate-50/50">
                    
                    <input type="file" id="file-upload-input" class="hidden" accept="image/*" multiple onchange="handleFileSelect(event)">
                    
                    <div id="dropzone-default">
                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="mt-2 text-xs font-bold text-slate-700">Tarik dan letakkan foto di sini</p>
                        <p class="mt-1 text-[11px] text-slate-500">atau <span class="text-forest-900 font-semibold underline">pilih berkas dari komputer</span></p>
                        <p class="mt-2 text-[10px] text-slate-400">Mendukung JPG, PNG, WEBP (Tanpa perlu input judul)</p>
                    </div>

                    <!-- Selected Preview Area -->
                    <div id="dropzone-preview" class="hidden">
                        <div class="relative w-36 h-36 mx-auto rounded-xl overflow-hidden border border-slate-200 shadow-md">
                            <img id="upload-preview-img" src="" alt="Preview" class="w-full h-full object-cover">
                        </div>
                        <p id="upload-file-name" class="mt-2 text-xs font-semibold text-slate-800 truncate max-w-xs mx-auto"></p>
                        <span class="inline-block mt-1 text-[10px] text-forest-800 font-bold bg-forest-50 px-2 py-0.5 rounded-md">Siap diunggah</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" 
                        onclick="closeUploadModal()" 
                        class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                    Batal
                </button>
                <button type="button" 
                        onclick="submitUpload()" 
                        class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Foto</span>
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
        let replaceTargetIndex = null;
        let currentPage = 1;
        const itemsPerPage = 12;

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

            // Keyboard shortcut for lightbox
            document.addEventListener('keydown', (e) => {
                const lightbox = document.getElementById('lightbox-modal');
                if (!lightbox.classList.contains('hidden')) {
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

        // Pagination renderer (Isi Full: Baris selalu 18 item penuh, 3 baris x 6 kolom)
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
            prevBtn.className = `px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1 transition-all ${
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
                    pageBtn.className = 'w-8 h-8 sm:w-9 sm:h-9 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white shadow-xs';
                } else {
                    pageBtn.className = 'w-8 h-8 sm:w-9 sm:h-9 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors';
                }
                pageBtn.onclick = () => goToPage(p);
                btnContainer.appendChild(pageBtn);
            }

            // Next Button
            const nextBtn = document.createElement('button');
            nextBtn.type = 'button';
            nextBtn.className = `px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1 transition-all ${
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
            const img = document.getElementById('lightbox-img');
            img.src = src;

            const counter = document.getElementById('lightbox-counter');
            counter.textContent = `Foto ${currentLightboxIndex + 1} / ${galleryCards.length}`;

            const downloadLink = document.getElementById('lightbox-download-link');
            downloadLink.href = src;
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
        function triggerReplacePhoto(index) {
            replaceTargetIndex = index;
            document.getElementById('replace-file-input').click();
        }

        function triggerReplaceFromLightbox() {
            triggerReplacePhoto(currentLightboxIndex);
        }

        function handleReplaceFile(event) {
            const file = event.target.files[0];
            if (!file || replaceTargetIndex === null) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const targetCard = galleryCards[replaceTargetIndex];
                if (targetCard) {
                    const img = targetCard.querySelector('img');
                    img.src = e.target.result;
                    targetCard.setAttribute('data-src', e.target.result);

                    // If lightbox is open, refresh
                    const lightbox = document.getElementById('lightbox-modal');
                    if (!lightbox.classList.contains('hidden')) {
                        document.getElementById('lightbox-img').src = e.target.result;
                    }

                    showToast('Foto berhasil diganti dengan berkas baru.');
                }
            };
            reader.readAsDataURL(file);
            event.target.value = '';
        }

        // Delete Photo
        function deletePhoto(index) {
            if (!confirm('Apakah Anda yakin ingin menghapus foto ini dari galeri?')) return;

            const card = galleryCards[index];
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
                    // Close lightbox if open
                    closeLightbox();
                    showToast('Foto telah dihapus dari galeri.');
                }, 300);
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

        function resetUploadForm() {
            document.getElementById('dropzone-default').classList.remove('hidden');
            document.getElementById('dropzone-preview').classList.add('hidden');
            document.getElementById('upload-preview-img').src = '';
            document.getElementById('upload-file-name').textContent = '';
            document.getElementById('file-upload-input').value = '';
        }

        function handleFileSelect(event) {
            const files = event.target.files;
            if (files && files[0]) {
                displaySelectedFile(files[0]);
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
            const files = e.dataTransfer.files;
            if (files && files[0]) {
                displaySelectedFile(files[0]);
            }
        }

        function displaySelectedFile(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('upload-preview-img').src = e.target.result;
                document.getElementById('upload-file-name').textContent = file.name;
                document.getElementById('dropzone-default').classList.add('hidden');
                document.getElementById('dropzone-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        function submitUpload() {
            const previewImg = document.getElementById('upload-preview-img');
            if (!previewImg.src || previewImg.src.endsWith('#') || previewImg.src === window.location.href) {
                alert('Silakan pilih atau tarik foto terlebih dahulu.');
                return;
            }

            const container = document.getElementById('gallery-container');

            // Insert new card directly at position 1 (right after upload tile)
            const newIndex = galleryCards.length;
            const newCard = document.createElement('div');
            newCard.className = 'gallery-card group relative aspect-square rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-xs hover:shadow-card transition-all cursor-pointer animate-in fade-in zoom-in-95 duration-300';
            newCard.setAttribute('data-index', newIndex);
            newCard.setAttribute('data-id', Date.now());
            newCard.setAttribute('data-src', previewImg.src);
            newCard.setAttribute('onclick', `openLightbox(${newIndex})`);

            newCard.innerHTML = `
                <img src="${previewImg.src}" alt="Foto Dokumentasi Baru" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-108">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2.5 flex flex-col justify-between z-10">
                    <div></div>
                    <div class="flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full bg-white/20 hover:bg-white text-white hover:text-slate-900 backdrop-blur-md flex items-center justify-center transition-all shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-1 pt-2 border-t border-white/20 text-xs">
                        <button type="button" onclick="event.stopPropagation(); triggerReplacePhoto(${newIndex})" class="text-[11px] font-bold text-white hover:text-amber-300 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            <span>Ganti</span>
                        </button>
                        <button type="button" onclick="event.stopPropagation(); deletePhoto(${newIndex})" class="text-[11px] font-bold text-rose-300 hover:text-rose-100 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            <span>Hapus</span>
                        </button>
                    </div>
                </div>
            `;

            // Insert right after upload box (second child)
            const uploadTile = container.children[0];
            if (uploadTile.nextSibling) {
                container.insertBefore(newCard, uploadTile.nextSibling);
            } else {
                container.appendChild(newCard);
            }

            closeUploadModal();
            refreshGalleryState();
            currentPage = 1;
            renderPagination();

            const countBadge = document.getElementById('photo-count-badge');
            if (countBadge) countBadge.textContent = `${galleryCards.length} Foto`;

            showToast('Foto baru berhasil diunggah langsung!');
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
            }, 3000);
        }
    </script>
    </x-slot:scripts>

</x-layouts.admin>
