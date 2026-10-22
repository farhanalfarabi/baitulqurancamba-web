<!-- 3D Coverflow Perspective Showcase Component -->
<section id="coverflow-showcase" class="py-20 sm:py-28 bg-[#FAF7F0] relative overflow-hidden select-none border-b border-[#121212]/10">
  
  <style>
    .coverflow-reflection {
      -webkit-box-reflect: below 6px linear-gradient(to bottom, rgba(0, 0, 0, 0) 65%, rgba(0, 0, 0, 0.16) 100%);
    }
    .coverflow-card {
      transform-origin: center center;
      backface-visibility: hidden;
      will-change: transform, opacity, filter;
    }
  </style>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10 sm:mb-14">
    <!-- Stamp Badge -->
    <div class="stamp-badge stamp-badge-lime mb-3 tilt-left inline-block">
      DOKUMENTASI VISUAL & ARSIP 3D
    </div>
    <h2 class="font-display font-black text-3xl sm:text-5xl text-[#121212] uppercase tracking-tight">
      POTRET KEHIDUPAN PESANTREN
    </h2>
    <p class="font-body text-sm sm:text-base text-slate-600 mt-2 max-w-xl mx-auto">
      Jelajahi ritme keseharian santri, capaian hafalan Al-Qur'an, dan ketenangan alam pegunungan Camba dalam etalase 3D interaktif.
    </p>
  </div>

  <!-- 3D Perspective Stage Container -->
  <div class="relative w-full max-w-6xl mx-auto px-4 overflow-visible">
    
    <!-- 3D Viewport Track -->
    <div id="coverflow-viewport" class="relative w-full h-[290px] sm:h-[360px] md:h-[400px] flex items-center justify-center [perspective:1200px] [transform-style:preserve-3d]">
      
      <!-- Card 0 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="0">
        <img src="/assets/images/pondok/halaqah-tahfidz.jpg" alt="Halaqah Fajar Al-Qur'an" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 1 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="1">
        <img src="/assets/images/pondok/pidato-3-bahasa.jpg" alt="Pidato 3 Bahasa" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 2 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="2">
        <img src="/assets/images/pondok/taklim-kitab-kuning.jpg" alt="Kajian Kitab Kuning Klasik" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 3 (Default Center) -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="3">
        <img src="/assets/images/pondok/leadership.jpg" alt="Kepemimpinan Santri" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 4 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="4">
        <img src="/assets/images/pondok/upacara.jpg" alt="Kedisiplinan & Upacara Bendera" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 5 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="5">
        <img src="/assets/images/pondok/eskul-futsal.jpg" alt="Olahraga Sunnah" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 6 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="6">
        <img src="/assets/images/pondok/gazebo.jpg" alt="Belajar di Hutan Pinus" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 7 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="7">
        <img src="/assets/images/pondok/masjid.jpg" alt="Ujian Tasmi' Al-Qur'an" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

      <!-- Card 8 -->
      <div class="coverflow-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[220px] h-[220px] sm:w-[270px] sm:h-[270px] md:w-[310px] md:h-[310px] rounded-[24px] sm:rounded-[28px] overflow-hidden cursor-pointer transition-all duration-500 ease-out coverflow-reflection"
           data-index="8">
        <img src="/assets/images/pondok/asrama.jpg" alt="Asrama Santri" class="w-full h-full object-cover pointer-events-none" draggable="false" />
      </div>

    </div>

    <!-- Navigation Arrow Buttons -->
    <button id="coverflow-btn-prev" aria-label="Slide Sebelumnya"
      class="absolute left-1 sm:left-4 md:left-8 top-1/2 -translate-y-1/2 z-40 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-white border-2 border-[#121212] shadow-[0_4px_16px_rgba(0,0,0,0.15)] flex items-center justify-center text-[#121212] font-display font-black text-lg transition-transform hover:scale-110 active:scale-95 cursor-pointer">
      ←
    </button>
    <button id="coverflow-btn-next" aria-label="Slide Berikutnya"
      class="absolute right-1 sm:right-4 md:right-8 top-1/2 -translate-y-1/2 z-40 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/95 hover:bg-white border-2 border-[#121212] shadow-[0_4px_16px_rgba(0,0,0,0.15)] flex items-center justify-center text-[#121212] font-display font-black text-lg transition-transform hover:scale-110 active:scale-95 cursor-pointer">
      →
    </button>
  </div>

  <!-- Center Card Information (Matching Reference 1:1 Layout) -->
  <div class="mt-8 sm:mt-11 max-w-sm mx-auto text-center px-4">
    
    <!-- Title -->
    <h3 id="coverflow-title" class="font-display font-bold text-xl sm:text-2xl text-[#121212] tracking-tight">
      Perkemahan Kepemimpinan Santri
    </h3>
    
    <!-- Subtitle -->
    <p id="coverflow-subtitle" class="font-body text-xs sm:text-sm text-slate-500 mt-1">
      Karakter, Kedisiplinan & Ketangguhan
    </p>

    <!-- Key-Value Metadata List -->
    <div class="mt-5 max-w-[280px] sm:max-w-[320px] mx-auto text-xs sm:text-sm font-body border-t border-slate-200/90 pt-3 flex flex-col gap-2">
      <div class="flex justify-between items-center text-slate-500">
        <span class="font-normal">Tahun</span>
        <span id="coverflow-year" class="font-bold text-[#121212] font-label">2025</span>
      </div>
      <div class="flex justify-between items-center text-slate-500">
        <span id="coverflow-meta-key-1" class="font-normal">Program</span>
        <span id="coverflow-meta-val-1" class="font-bold text-[#121212]">Kepemimpinan Santri</span>
      </div>
      <div class="flex justify-between items-center text-slate-500">
        <span id="coverflow-meta-key-2" class="font-normal">Fokus</span>
        <span id="coverflow-meta-val-2" class="font-bold text-[#121212]">Kematangan Organisasi</span>
      </div>
    </div>

    <!-- Dots Pagination Indicator -->
    <div id="coverflow-dots-container" class="mt-6 flex items-center justify-center gap-2">
      <!-- Injected via JavaScript -->
    </div>
  </div>

  <!-- Coverflow Interactivity Script -->
  <script>
    (function init3DCoverflow() {
      const COVERFLOW_DATA = [
        {
          title: "Halaqah Fajar Al-Qur'an",
          subtitle: "Pusat Hafalan 30 Juz Mutqin",
          year: "2025",
          key1: "Program",
          val1: "Tahfizh 30 Juz",
          key2: "Lokasi",
          val2: "Masjid Utama Camba"
        },
        {
          title: "Pidato 3 Bahasa",
          subtitle: "Pidato Bahasa Arab, Inggris & Indonesia",
          year: "2025",
          key1: "Program",
          val1: "Muhadharah & Retorika",
          key2: "Jadwal",
          val2: "Pentas Rutin Mingguan"
        },
        {
          title: "Dirosah Islamiyah Turats",
          subtitle: "Kajian Fiqih, Hadits & Adab Klasik",
          year: "2024",
          key1: "Program",
          val1: "Kajian Fiqih & Hadits",
          key2: "Pembimbing",
          val2: "Alumni Timur Tengah"
        },
        {
          title: "Perkemahan Kepemimpinan Santri",
          subtitle: "Karakter, Kedisiplinan & Ketangguhan",
          year: "2025",
          key1: "Program",
          val1: "Kepemimpinan Santri",
          key2: "Fokus",
          val2: "Kematangan Organisasi"
        },
        {
          title: "Upacara & Kedisiplinan Santri",
          subtitle: "Jiwa Patriotisme, Fokus & Ketertiban",
          year: "2025",
          key1: "Program",
          val1: "Pendidikan Formal",
          key2: "Kurikulum",
          val2: "Ijazah Resmi Wustha & Ulya"
        },
        {
          title: "Olahraga Sunnah & Kebugaran",
          subtitle: "Ketangkasan Fisik & Sportivitas",
          year: "2024",
          key1: "Program",
          val1: "Ekstrakurikuler Olahraga",
          key2: "Jadwal",
          val2: "Sore Hari"
        },
        {
          title: "Kajian Alam Terbuka Hutan Pinus",
          subtitle: "Gazebo Belajar Sejuk di Pegunungan",
          year: "2025",
          key1: "Program",
          val1: "Muraja'ah Luar Ruangan",
          key2: "Lokasi",
          val2: "Kawasan Hutan Pinus"
        },
        {
          title: "Ujian Tasmi' Al-Qur'an",
          subtitle: "Setoran Hafalan Bil Ghaib Sekali Duduk",
          year: "2025",
          key1: "Program",
          val1: "Tasmi' & Munaqasyah",
          key2: "Penguji",
          val2: "Dewan Asatidz Penguji"
        },
        {
          title: "Asrama & Hunian Santri",
          subtitle: "Kamar Asrama Bersih & Penuh Kekeluargaan",
          year: "2024",
          key1: "Program",
          val1: "Kehidupan Asrama 24 Jam",
          key2: "Pendampingan",
          val2: "Pembina Asrama 24 Jam"
        }
      ];

      function setup() {
        const viewport = document.getElementById('coverflow-viewport');
        if (!viewport) return;

        const cards = Array.from(viewport.querySelectorAll('.coverflow-card'));
        const dotsContainer = document.getElementById('coverflow-dots-container');
        const titleEl = document.getElementById('coverflow-title');
        const subtitleEl = document.getElementById('coverflow-subtitle');
        const yearEl = document.getElementById('coverflow-year');
        const key1El = document.getElementById('coverflow-meta-key-1');
        const val1El = document.getElementById('coverflow-meta-val-1');
        const key2El = document.getElementById('coverflow-meta-key-2');
        const val2El = document.getElementById('coverflow-meta-val-2');
        const btnPrev = document.getElementById('coverflow-btn-prev');
        const btnNext = document.getElementById('coverflow-btn-next');

        if (!cards.length) return;

        let activeIndex = 3; // Start on item 3
        const total = cards.length;

        // Build dots
        if (dotsContainer) {
          dotsContainer.innerHTML = '';
          for (let i = 0; i < total; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full transition-all duration-300 cursor-pointer focus:outline-none';
            dot.setAttribute('aria-label', 'Menuju slide ' + (i + 1));
            dot.addEventListener('click', () => {
              goTo(i);
            });
            dotsContainer.appendChild(dot);
          }
        }

        function updateLayout() {
          const width = window.innerWidth;
          const isMobile = width < 640;
          const isTablet = width < 768;

          const stepX = isMobile ? 70 : (isTablet ? 110 : 145);
          const baseOffset = isMobile ? 35 : (isTablet ? 55 : 75);
          const baseZ = isMobile ? 45 : 80;

          cards.forEach((card, i) => {
            const diff = i - activeIndex;

            if (diff === 0) {
              // Center card
              card.style.transform = 'translate(-50%, -50%) translate3d(0px, 0px, 0px) rotateY(0deg) scale(1)';
              card.style.zIndex = '50';
              card.style.opacity = '1';
              card.style.filter = 'brightness(1)';
              card.style.boxShadow = '0 25px 45px -10px rgba(0, 0, 0, 0.35), 0 10px 22px -8px rgba(0, 0, 0, 0.2)';
              card.style.cursor = 'default';
            } else if (diff < 0) {
              // Left cards
              const absDiff = Math.abs(diff);
              const tx = diff * stepX - baseOffset;
              const tz = -absDiff * baseZ;
              const ry = 40 + Math.min(absDiff * 2, 8);
              const scale = Math.max(0.6, 1 - absDiff * 0.12);
              const opacity = absDiff > 3 ? 0 : Math.max(0.45, 1 - absDiff * 0.18);
              const bright = Math.max(0.72, 1 - absDiff * 0.08);

              card.style.transform = `translate(-50%, -50%) translate3d(${tx}px, 0px, ${tz}px) rotateY(${ry}deg) scale(${scale})`;
              card.style.zIndex = `${50 - absDiff * 5}`;
              card.style.opacity = `${opacity}`;
              card.style.filter = `brightness(${bright})`;
              card.style.boxShadow = '0 15px 30px -8px rgba(0, 0, 0, 0.22)';
              card.style.cursor = 'pointer';
            } else {
              // Right cards
              const absDiff = Math.abs(diff);
              const tx = diff * stepX + baseOffset;
              const tz = -absDiff * baseZ;
              const ry = -(40 + Math.min(absDiff * 2, 8));
              const scale = Math.max(0.6, 1 - absDiff * 0.12);
              const opacity = absDiff > 3 ? 0 : Math.max(0.45, 1 - absDiff * 0.18);
              const bright = Math.max(0.72, 1 - absDiff * 0.08);

              card.style.transform = `translate(-50%, -50%) translate3d(${tx}px, 0px, ${tz}px) rotateY(${ry}deg) scale(${scale})`;
              card.style.zIndex = `${50 - absDiff * 5}`;
              card.style.opacity = `${opacity}`;
              card.style.filter = `brightness(${bright})`;
              card.style.boxShadow = '0 15px 30px -8px rgba(0, 0, 0, 0.22)';
              card.style.cursor = 'pointer';
            }
          });

          // Update info text
          const data = COVERFLOW_DATA[activeIndex] || COVERFLOW_DATA[0];
          if (titleEl) titleEl.textContent = data.title;
          if (subtitleEl) subtitleEl.textContent = data.subtitle;
          if (yearEl) yearEl.textContent = data.year;
          if (key1El) key1El.textContent = data.key1;
          if (val1El) val1El.textContent = data.val1;
          if (key2El) key2El.textContent = data.key2;
          if (val2El) val2El.textContent = data.val2;

          // Update dots
          if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('button');
            dots.forEach((dot, idx) => {
              if (idx === activeIndex) {
                dot.className = 'w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-[#121212] scale-110 transition-all duration-300 cursor-pointer shadow-sm';
              } else {
                dot.className = 'w-2 h-2 sm:w-2 sm:h-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer';
              }
            });
          }
        }

        function goTo(index) {
          activeIndex = Math.max(0, Math.min(total - 1, index));
          updateLayout();
        }

        function prev() {
          if (activeIndex > 0) goTo(activeIndex - 1);
          else goTo(total - 1); // Loop to end
        }

        function next() {
          if (activeIndex < total - 1) goTo(activeIndex + 1);
          else goTo(0); // Loop to start
        }

        // Click card to center
        cards.forEach((card, i) => {
          card.addEventListener('click', () => {
            goTo(i);
          });
        });

        // Prev & Next buttons
        if (btnPrev) btnPrev.addEventListener('click', prev);
        if (btnNext) btnNext.addEventListener('click', next);

        // Keyboard arrow navigation
        window.addEventListener('keydown', (e) => {
          // Check if coverflow section is near viewport
          const rect = viewport.getBoundingClientRect();
          const inView = rect.top < window.innerHeight && rect.bottom > 0;
          if (!inView) return;

          if (e.key === 'ArrowLeft') prev();
          if (e.key === 'ArrowRight') next();
        });

        // Touch & Mouse Drag / Swipe
        let startX = 0;
        let isDragging = false;

        viewport.addEventListener('mousedown', (e) => {
          startX = e.clientX;
          isDragging = true;
        });

        viewport.addEventListener('mouseup', (e) => {
          if (!isDragging) return;
          const diff = e.clientX - startX;
          if (Math.abs(diff) > 40) {
            if (diff > 0) prev();
            else next();
          }
          isDragging = false;
        });

        viewport.addEventListener('touchstart', (e) => {
          startX = e.touches[0].clientX;
        }, { passive: true });

        viewport.addEventListener('touchend', (e) => {
          const diff = e.changedTouches[0].clientX - startX;
          if (Math.abs(diff) > 40) {
            if (diff > 0) prev();
            else next();
          }
        }, { passive: true });

        // Resize listener
        window.addEventListener('resize', updateLayout);

        // Initial paint
        updateLayout();
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setup);
      } else {
        setTimeout(setup, 60);
      }
    })();
  </script>
</section>
