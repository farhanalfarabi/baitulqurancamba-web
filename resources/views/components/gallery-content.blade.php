@props([
    'galleries' => null,
])

@php
    if ($galleries === null) {
        $galleries = \App\Models\Gallery::query()
            ->orderBy('year', 'desc')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('year');
    }

    $totalPhotos = $galleries->flatten()->count();

    $ribbonStyles = [
        ['bg' => 'bg-[#121212]', 'text' => 'text-lime', 'tilt' => 'tilt-left'],
        ['bg' => 'bg-[#CF2B09]', 'text' => 'text-white', 'tilt' => 'tilt-right'],
        ['bg' => 'bg-[#580D14]', 'text' => 'text-white', 'tilt' => 'tilt-left'],
        ['bg' => 'bg-[#0B3B2C]', 'text' => 'text-amber-300', 'tilt' => 'tilt-right'],
    ];
@endphp

<!-- Gallery Page Content Component: Tight Masonry Collage by Year (Varied Heights, Pure Photos, Zero Text Clutter) -->
<section class="relative pt-6 sm:pt-10 pb-20 overflow-hidden bg-dot-matrix bg-[#FAF7F0]">

  <!-- Floating Decorative Stickers -->
  <div class="hidden xl:block absolute top-12 left-10 w-24 h-auto tilt-left opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-rocket.svg" alt="Sunnah Archery Bow & Arrow" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden xl:block absolute top-16 right-12 w-28 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-trophy.svg" alt="Classical Islamic Kitab & Qalam" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden lg:block absolute bottom-32 left-12 w-28 h-auto tilt-left opacity-80 pointer-events-none z-10">
    <img src="/assets/images/sticker-van.svg" alt="Sunnah Equestrian Horse" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden lg:block absolute bottom-40 right-14 w-20 h-auto tilt-right opacity-80 pointer-events-none z-10">
    <img src="/assets/images/sticker-megaphone.svg" alt="Mosque Minaret & Call to Prayer" class="w-full h-auto drop-shadow-md">
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <!-- Header Lockup -->
    <div class="text-center max-w-4xl mx-auto mb-10 sm:mb-12">
      
      <!-- Top Pill Badge -->
      <div class="inline-flex items-center gap-2 pl-2 pr-4 py-1.5 rounded-full bg-[#121212] text-lime border-[2px] border-[#121212] brutal-shadow-sm mb-4">
        <span class="w-2.5 h-2.5 rounded-full bg-lime animate-pulse"></span>
        <span class="font-label font-bold text-[10px] sm:text-xs tracking-wider uppercase text-lime">
          ARSIP KEHIDUPAN SANTRI & KAMPUS · KOLEKSI FOTO
        </span>
      </div>

      <!-- Main Display Title -->
      <h1 class="font-display font-black text-3xl sm:text-5xl lg:text-6xl tracking-tight text-[#121212] uppercase leading-[1.02] sm:leading-[1.05] mb-4">
        MOMENTUM & KILAS BALIK <br>
        <span class="inline-flex items-center justify-center flex-wrap gap-x-3">
          <span class="font-cursive italic font-bold lowercase text-[1.15em] text-[#CF2B09] -rotate-2 inline-block">rekaman jejak santri</span>
          <span>DI CAMBA</span>
        </span>
      </h1>

      <p class="font-body text-sm sm:text-base text-gray-700 font-medium max-w-2xl mx-auto leading-relaxed mb-6">
        Koleksi dokumentasi foto nyata santri Baitul Qur'an Camba dari tahun ke tahun: halaqah hafalan Al-Qur'an, kelas formal, kepemimpinan, dan keseharian di lereng pegunungan Camba.
      </p>

      <!-- Year Filter Bar (Dynamic Capsule Buttons) -->
      @if($galleries->isNotEmpty())
        <div class="flex justify-center">
          <div id="gallery-year-filter" class="inline-flex items-center justify-center flex-wrap gap-2 p-1.5 bg-white/90 backdrop-blur-sm border-2 border-[#161616] rounded-2xl sm:rounded-full brutal-shadow-sm">
            
            <button data-year="all" class="year-tab-btn active px-4 sm:px-6 py-2 rounded-xl sm:rounded-full font-label font-bold text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer bg-[#121212] text-lime border-2 border-[#161616] brutal-shadow-sm">
              <span>Semua Tahun</span>
              <span class="ml-1 text-[10px] opacity-80">({{ $totalPhotos }})</span>
            </button>

            @foreach($galleries as $year => $photos)
              <button data-year="{{ $year }}" class="year-tab-btn px-4 sm:px-6 py-2 rounded-xl sm:rounded-full font-label font-bold text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer bg-white text-[#121212] border-2 border-transparent hover:bg-gray-100">
                <span>Tahun {{ $year }}</span>
                <span class="ml-1 text-[10px] text-gray-500">({{ $photos->count() }})</span>
              </button>
            @endforeach

          </div>
        </div>
      @endif

    </div>

    <!-- =========================================================================
         DYNAMIC SECTIONS PER YEAR (Tight Masonry Columns - Dempetan & Varied Heights)
         ========================================================================= -->
    @php
        $yearIndex = 0;
    @endphp

    @forelse($galleries as $year => $photos)
      @php
          $style = $ribbonStyles[$yearIndex % count($ribbonStyles)];
          $yearIndex++;
      @endphp

      <section id="section-{{ $year }}" class="gallery-year-section mb-16 sm:mb-20 transition-opacity duration-300" data-year="{{ $year }}">
        
        <!-- Year Header Ribbon -->
        <div class="flex items-center gap-4 mb-5 sm:mb-6">
          <div class="px-5 py-2 rounded-2xl {{ $style['bg'] }} {{ $style['text'] }} font-display font-black text-2xl sm:text-3xl tracking-tight border-2 border-[#161616] brutal-shadow {{ $style['tilt'] }} transform">
            {{ $year }}
          </div>
          <div class="h-0.5 flex-1 bg-[#121212]/20"></div>
          <span class="font-label text-xs sm:text-sm font-bold uppercase tracking-wider text-gray-500">
            TAHUN AJARAN {{ (int)$year - 1 }} / {{ $year }} · {{ $photos->count() }} FOTO
          </span>
        </div>

        <!-- Tight Masonry Columns: Varied Heights & Close Spacing -->
        <div class="columns-2 sm:columns-3 md:columns-4 lg:columns-5 gap-2.5 sm:gap-3">
          
          @foreach($photos as $photo)
            <div class="break-inside-avoid mb-2.5 sm:mb-3 photo-card p-1.5 sm:p-2 bg-white rounded-xl sm:rounded-2xl border-2 border-[#161616] brutal-shadow-sm hover:scale-[1.03] hover:z-20 hover:shadow-2xl transition-all duration-300 cursor-pointer overflow-hidden group" 
                 data-year="{{ $year }}"
                 data-src="{{ $photo->image_url }}"
                 data-caption="{{ $photo->caption ?? '' }}">
              <div class="rounded-lg sm:rounded-xl overflow-hidden bg-gray-100">
                <img src="{{ $photo->image_url }}" 
                     alt="{{ $photo->caption ?? 'Baitul Qur\'an Camba '.$year }}" 
                     class="w-full h-auto object-cover block group-hover:scale-105 transition-transform duration-500" 
                     loading="lazy">
              </div>
            </div>
          @endforeach

        </div>
      </section>

    @empty
      <div class="text-center py-16 bg-white/70 rounded-3xl border-2 border-[#161616] p-8 max-w-xl mx-auto brutal-shadow-sm mb-16">
        <p class="font-display font-black text-xl uppercase text-[#121212] mb-2">Dokumentasi Sedang Disiapkan</p>
        <p class="font-body text-sm text-gray-600">Foto dokumentasi santri Baitul Qur'an Camba akan segera diperbarui.</p>
      </div>
    @endforelse

    <!-- Campus Visit Callout Billboard (Cherry Wine Signature) -->
    <div class="mt-8 bg-[#580D14] rounded-3xl p-8 sm:p-12 text-white border-4 border-white shadow-2xl relative overflow-hidden">
      <!-- Background SVG Accent -->
      <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none w-72 h-72">
        <img src="/assets/svg/footer-wave-shape.svg" alt="" class="w-full h-full filter invert">
      </div>

      <div class="relative z-10 max-w-3xl">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-lime text-[#121212] font-label font-bold text-[10px] uppercase tracking-wider mb-4 border border-[#161616]">
          <span>KUNJUNGAN KAMPUS</span>
          <span>·</span>
          <span>CAMBA, MAROS</span>
        </div>
        <h2 class="font-display font-black text-3xl sm:text-5xl uppercase tracking-tight leading-tight mb-4">
          INGIN MELIHAT LANGSUNG <br>
          <span class="font-cursive lowercase text-lime text-4xl sm:text-6xl font-bold inline-block transform -rotate-2">suasana</span> KAMPUS KAMI?
        </h2>
        <p class="font-body text-sm sm:text-base text-white/90 font-medium leading-relaxed mb-8 max-w-2xl">
          Kami menyambut hangat kedatangan calon santri dan orang tua untuk berkunjung, berkeliling kampus, berkonsultasi mengenai program 30 Juz & formal, serta menikmati sejuknya alam pesantren di Camba.
        </p>

        <div class="flex flex-col sm:flex-row items-center gap-4">
          <a href="{{ route('pendaftaran') }}" class="w-full sm:w-auto bg-lime text-[#121212] border-2 border-[#161616] rounded-xl px-7 py-3.5 font-display font-black text-xs uppercase tracking-wider flex items-center justify-center gap-2.5 transition-transform hover:scale-[1.03] active:scale-[0.98] cursor-pointer shadow-lg">
            <span>DAFTAR SANTRI BARU</span>
            <span class="w-5 h-5 rounded-full bg-[#E53935] text-white flex items-center justify-center text-[10px] font-black">➔</span>
          </a>
          
          <a href="https://wa.me/6282124880061" target="_blank" class="w-full sm:w-auto bg-white text-[#121212] border-2 border-[#161616] rounded-xl px-6 py-3.5 font-display font-black text-xs uppercase tracking-wider flex items-center justify-center gap-2 transition-transform hover:scale-[1.03] active:scale-[0.98] shadow-md">
            <span>WHATSAPP KONSULTASI</span>
            <span>📱</span>
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- Pure Photo Lightbox Viewer (Zero Text Clutter) -->
  <div id="gallery-lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/90 backdrop-blur-md p-4 sm:p-6 transition-opacity duration-300 select-none">
    <div class="relative max-w-5xl w-full bg-white rounded-3xl p-3 sm:p-4 border-3 border-[#161616] shadow-2xl flex flex-col max-h-[92vh]">
      
      <!-- Top Bar: Year Badge, Counter & Close Button -->
      <div class="flex items-center justify-between pb-2 mb-2 border-b border-gray-200">
        <span id="lightbox-year" class="px-3 py-1 rounded-full bg-[#121212] text-lime font-display font-black text-xs uppercase tracking-wider border border-[#161616]">
          2026
        </span>
        
        <div class="flex items-center gap-3">
          <span id="lightbox-counter" class="font-label text-xs font-bold text-gray-500">1 / 30</span>
          <button id="lightbox-close-btn" class="w-9 h-9 rounded-full bg-gray-100 hover:bg-[#E53935] hover:text-white border-2 border-[#161616] flex items-center justify-center font-black text-sm transition-colors cursor-pointer" aria-label="Close modal">
            ✕
          </button>
        </div>
      </div>

      <!-- Pure Large Image Frame -->
      <div class="relative flex-1 overflow-hidden rounded-2xl bg-[#161616] flex items-center justify-center min-h-[300px] sm:min-h-[460px] max-h-[75vh]">
        <img id="lightbox-img" src="" alt="Gallery Photo" class="max-w-full max-h-full object-contain select-none">
        
        <!-- Prev & Next Overlay Buttons -->
        <button id="lightbox-prev-btn" class="absolute left-3 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 hover:bg-lime text-[#121212] border-2 border-[#161616] flex items-center justify-center font-black text-lg transition-transform hover:scale-110 active:scale-95 brutal-shadow-sm cursor-pointer" aria-label="Previous image">
          ‹
        </button>
        <button id="lightbox-next-btn" class="absolute right-3 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 hover:bg-lime text-[#121212] border-2 border-[#161616] flex items-center justify-center font-black text-lg transition-transform hover:scale-110 active:scale-95 brutal-shadow-sm cursor-pointer" aria-label="Next image">
          ›
        </button>
      </div>

    </div>
  </div>

  <!-- Interactive JavaScript for Public Gallery (Tabs Filter & Lightbox) -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // 1. Tab Year Filtering
      const yearButtons = document.querySelectorAll('.year-tab-btn');
      const yearSections = document.querySelectorAll('.gallery-year-section');

      yearButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          const targetYear = btn.getAttribute('data-year');

          // Toggle button styles
          yearButtons.forEach(b => {
            b.classList.remove('active', 'bg-[#121212]', 'text-lime', 'border-[#161616]', 'brutal-shadow-sm');
            b.classList.add('bg-white', 'text-[#121212]', 'border-transparent');
          });

          btn.classList.add('active', 'bg-[#121212]', 'text-lime', 'border-[#161616]', 'brutal-shadow-sm');
          btn.classList.remove('bg-white', 'border-transparent');

          // Filter sections
          yearSections.forEach(section => {
            if (targetYear === 'all' || section.getAttribute('data-year') === targetYear) {
              section.classList.remove('hidden');
            } else {
              section.classList.add('hidden');
            }
          });
        });
      });

      // 2. Lightbox functionality
      const lightbox = document.getElementById('gallery-lightbox');
      const lightboxImg = document.getElementById('lightbox-img');
      const lightboxYear = document.getElementById('lightbox-year');
      const lightboxCounter = document.getElementById('lightbox-counter');
      const closeBtn = document.getElementById('lightbox-close-btn');
      const prevBtn = document.getElementById('lightbox-prev-btn');
      const nextBtn = document.getElementById('lightbox-next-btn');

      let currentPhotoIndex = 0;
      let activePhotoCards = [];

      function getVisiblePhotoCards() {
        return Array.from(document.querySelectorAll('.photo-card')).filter(card => {
          return !card.closest('.gallery-year-section').classList.contains('hidden');
        });
      }

      function openPublicLightbox(index) {
        activePhotoCards = getVisiblePhotoCards();
        if (activePhotoCards.length === 0) return;

        currentPhotoIndex = index;
        updatePublicLightbox();
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.classList.add('overflow-hidden');
      }

      function closePublicLightbox() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
      }

      function updatePublicLightbox() {
        const card = activePhotoCards[currentPhotoIndex];
        if (!card) return;

        const src = card.getAttribute('data-src');
        const year = card.getAttribute('data-year');

        lightboxImg.src = src;
        lightboxYear.textContent = year ? `Tahun ${year}` : 'Galeri';
        lightboxCounter.textContent = `${currentPhotoIndex + 1} / ${activePhotoCards.length}`;
      }

      function prevPublicPhoto() {
        if (activePhotoCards.length === 0) return;
        currentPhotoIndex = (currentPhotoIndex - 1 + activePhotoCards.length) % activePhotoCards.length;
        updatePublicLightbox();
      }

      function nextPublicPhoto() {
        if (activePhotoCards.length === 0) return;
        currentPhotoIndex = (currentPhotoIndex + 1) % activePhotoCards.length;
        updatePublicLightbox();
      }

      // Attach click listeners to cards
      document.querySelectorAll('.photo-card').forEach((card) => {
        card.addEventListener('click', () => {
          activePhotoCards = getVisiblePhotoCards();
          const cardIndex = activePhotoCards.indexOf(card);
          if (cardIndex !== -1) {
            openPublicLightbox(cardIndex);
          }
        });
      });

      closeBtn.addEventListener('click', closePublicLightbox);
      prevBtn.addEventListener('click', prevPublicPhoto);
      nextBtn.addEventListener('click', nextPublicPhoto);

      lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
          closePublicLightbox();
        }
      });

      document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
          if (e.key === 'Escape') closePublicLightbox();
          if (e.key === 'ArrowLeft') prevPublicPhoto();
          if (e.key === 'ArrowRight') nextPublicPhoto();
        }
      });
    });
  </script>

</section>
