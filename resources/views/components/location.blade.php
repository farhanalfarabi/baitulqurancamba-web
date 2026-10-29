<!-- Campus Location & Google Maps Section (Style 1: Tactile GPS Radar & Campus Navigator Console) -->
<section id="location" class="py-20 sm:py-28 bg-[#FAF7F0] bg-dot-matrix relative overflow-hidden">
  
  <!-- Decorative Floating Stickers -->
  <div class="hidden lg:block absolute top-12 left-10 w-24 h-auto tilt-left opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-van.svg" alt="Campus Travel Van Sticker" class="w-full h-auto drop-shadow-lg">
  </div>
  <div class="hidden lg:block absolute top-20 right-12 w-20 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-starburst.svg" alt="Compass Starburst Sticker" class="w-full h-auto drop-shadow-lg">
  </div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">

    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
      <div class="stamp-badge stamp-badge-red mb-4 inline-block">
        PETA & PANDUAN LOKASI KAMPUS
      </div>
      <h2 class="font-display font-black text-4xl sm:text-6xl text-[#121212] uppercase tracking-tight leading-none">
        LOKASI KAMPUS KAMI<br>
        <span class="inline-block mt-2 px-5 py-2 bg-[#121212] text-lime rounded-xl border-2 border-[#161616] tilt-right transform text-3xl sm:text-5xl">
          CAMBA, SULAWESI SELATAN
        </span>
      </h2>
      <p class="font-body text-base sm:text-lg text-[#555555] font-medium mt-6 leading-relaxed">
        Terletak di kawasan pegunungan asri dan sejuk Kabupaten Maros. Lingkungan belajar yang tenang, nyaman, dan bebas polusi, sangat kondusif untuk konsentrasi hafalan Al-Qur'an dan pembinaan karakter santri.
      </p>
    </div>

    <!-- Clean Navigator Console Window -->
    <div class="rounded-3xl bg-white border border-stone-200/90 shadow-2xl overflow-hidden">
      
      <!-- Top Console Header Bar -->
      <div class="bg-stone-900 text-white px-4 sm:px-6 py-3 sm:py-3.5 flex flex-wrap items-center justify-between gap-3 border-b border-stone-800">
        
        <!-- Left: Window Controls & Live Signal -->
        <div class="flex items-center gap-2.5 sm:gap-3">
          <div class="flex items-center gap-1.5" aria-hidden="true">
            <span class="w-2.5 h-2.5 rounded-full bg-rose-500 inline-block"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-amber-400 inline-block"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 inline-block"></span>
          </div>

          <div class="h-3.5 w-[1px] bg-white/20 mx-0.5 hidden sm:block"></div>

          <!-- Pulsing Live Radar Indicator -->
          <div class="flex items-center gap-2">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
            </span>
            <span class="font-sans text-xs uppercase tracking-wider text-stone-200 font-semibold">
              Peta Lokasi Interaktif
            </span>
          </div>
        </div>

        <!-- Center: Interactive Filter Modes (Normal / High Contrast / Night Radar) -->
        <div class="flex items-center gap-1 bg-stone-800/80 p-1 rounded-xl text-xs font-medium">
          <button type="button" id="map-mode-default" class="map-mode-btn px-2.5 py-1 rounded-lg bg-white text-stone-900 shadow-sm font-semibold transition-all cursor-pointer" data-filter="none">
            Standar
          </button>
          <button type="button" id="map-mode-vibrant" class="map-mode-btn px-2.5 py-1 rounded-lg text-stone-300 hover:text-white transition-all cursor-pointer font-medium" data-filter="contrast(1.15) saturate(1.25)">
            Satelit
          </button>
          <button type="button" id="map-mode-night" class="map-mode-btn px-2.5 py-1 rounded-lg text-stone-300 hover:text-white transition-all cursor-pointer font-medium" data-filter="invert(90%) hue-rotate(180deg) contrast(1.15)">
            Malam
          </button>
        </div>

        <!-- Right: Coordinates Badge + Copy Action -->
        <div class="flex items-center gap-2 w-full sm:w-auto justify-end sm:justify-start">
          <button type="button" id="btn-copy-coordinates" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-stone-800/80 hover:bg-stone-800 text-stone-300 hover:text-white text-xs font-mono transition-all cursor-pointer" title="Klik untuk menyalin koordinat">
            <span id="coords-text">-4.91386°, 119.84656°</span>
            <svg id="copy-icon" class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
            </svg>
            <span id="copy-success-badge" class="hidden text-emerald-400 font-bold text-[11px]">Tersalin!</span>
          </button>
        </div>

      </div>

      <!-- Console Body: Stacked on Mobile, Floating HUD on Desktop -->
      <div class="relative flex flex-col sm:block">
        
        <!-- Map Viewport -->
        <div class="relative w-full h-[360px] sm:h-[580px] bg-[#E5E3DF] overflow-hidden">
          <!-- Google Maps Embed Iframe -->
          <iframe
            id="google-maps-frame"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.242982885935!2d119.84399227585507!3d-4.913859949791484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe61712cc6b2f7%3A0xfce6c0fd433a7e6d!2sPondok%20Pesantren%20Tahfizh%20Baitul%20Qur'an%20Camba!5e0!3m2!1sen!2sid!4v1729567000000!5m2!1sen!2sid"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Google Maps - Pondok Pesantren Tahfizh Baitul Qur'an Camba"
            class="w-full h-full min-h-[360px] sm:min-h-[580px] transition-all duration-500 ease-in-out"
          ></iframe>
        </div>

        <!-- Campus Info & Actions Card: Clean Glassmorphic HUD -->
        <div class="p-5 sm:p-6 bg-white sm:bg-white/95 sm:backdrop-blur-md sm:rounded-2xl border-t border-stone-200 sm:border sm:border-stone-200/90 sm:shadow-2xl z-20 sm:absolute sm:bottom-6 sm:left-6 sm:right-auto sm:max-w-md transition-all text-left">
          
          <!-- Verified Pin Badge & Rating -->
          <div class="flex items-center justify-between gap-2 mb-3">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium text-xs">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
              <span>Kampus Resmi Terverifikasi</span>
            </div>
            <div class="flex items-center gap-1 text-xs font-semibold text-stone-700">
              <span class="text-amber-400 text-sm">★</span>
              <span>5.0</span>
              <span class="text-stone-400 font-normal text-[11px]">(Google Maps)</span>
            </div>
          </div>

          <!-- Institution Name -->
          <h3 class="font-display font-bold text-lg sm:text-xl text-stone-900 leading-snug mb-2">
            Pondok Pesantren Tahfizh Baitul Qur'an Camba
          </h3>

          <!-- Address -->
          <p class="text-xs sm:text-sm text-stone-600 leading-relaxed mb-4 flex items-start gap-2">
            <svg class="w-4 h-4 text-[#CF2B09] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Jumpulu, Link. Mallisu, Kel. Cempaniga, Kec. Camba, Kab. Maros, Sulawesi Selatan 90562, Indonesia</span>
          </p>

          <!-- Transit Highlights Chips -->
          <div class="flex flex-wrap gap-2 mb-5 text-xs text-stone-600 font-medium">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-stone-50 border border-stone-200/70">
              ✈️ ~90 Menit dari Bandara UPG
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-stone-50 border border-stone-200/70">
              🛣️ Jalur Poros Maros – Bone
            </span>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5">
            
            <!-- Get Directions CTA -->
            <a
              href="https://www.google.com/maps/dir/?api=1&destination=-4.91386,119.8465672"
              target="_blank"
              rel="noopener noreferrer"
              class="flex-1 bg-[#CF2B09] hover:bg-[#b02407] text-white rounded-xl px-4 py-3 font-semibold text-xs uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm hover:shadow-md transition-all text-center cursor-pointer"
            >
              <span>Petunjuk Arah</span>
              <span class="text-xs">➔</span>
            </a>

            <!-- Open in Maps -->
            <a
              href="https://www.google.com/maps/place/Pondok+Pesantren+Tahfizh+Baitul+Qur'an+Camba/@-4.91386,119.8465672,17z"
              target="_blank"
              rel="noopener noreferrer"
              class="bg-white hover:bg-stone-50 text-stone-800 border border-stone-200 rounded-xl px-4 py-3 font-semibold text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 shadow-sm hover:shadow transition-all cursor-pointer"
              title="Buka halaman Google Maps lengkap"
            >
              <svg class="w-3.5 h-3.5 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
              </svg>
              <span>Buka Peta</span>
            </a>

            <!-- Share Button -->
            <button
              type="button"
              id="btn-share-location"
              class="bg-stone-50 hover:bg-stone-100 text-stone-700 border border-stone-200 rounded-xl p-3 flex items-center justify-center transition-colors cursor-pointer"
              title="Bagikan atau salin tautan lokasi kampus"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
              </svg>
            </button>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Coordinates Copied Toast Notification -->
  <div
    id="location-toast"
    class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-3 bg-stone-900 text-white px-5 py-3.5 rounded-2xl shadow-2xl border border-stone-800"
    role="alert"
  >
    <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs">
      ✓
    </div>
    <div class="text-xs">
      <span class="font-semibold text-emerald-400 block" id="toast-title">Koordinat Tersalin</span>
      <span class="text-stone-300" id="toast-message">Koordinat kampus berhasil disalin ke papan klip.</span>
    </div>
  </div>

</section>

<!-- Interactive Map Script -->
<script>
  (function () {
    const coordsString = "-4.91386, 119.8465672";
    const mapsShareUrl = "https://www.google.com/maps/place/Pondok+Pesantren+Tahfizh+Baitul+Qur'an+Camba/@-4.91386,119.8465672,17z";

    // Toast helper
    function showLocationToast(title, message) {
      const toast = document.getElementById('location-toast');
      const titleEl = document.getElementById('toast-title');
      const msgEl = document.getElementById('toast-message');
      if (!toast || !titleEl || !msgEl) return;

      titleEl.textContent = title;
      msgEl.textContent = message;
      toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');

      clearTimeout(window._locationToastTimeout);
      window._locationToastTimeout = setTimeout(() => {
        toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
      }, 3000);
    }

    // 1. Copy Coordinates
    const copyBtn = document.getElementById('btn-copy-coordinates');
    const copyBadge = document.getElementById('copy-success-badge');
    const coordsText = document.getElementById('coords-text');

    if (copyBtn) {
      copyBtn.addEventListener('click', async () => {
        try {
          await navigator.clipboard.writeText(coordsString);
          if (copyBadge) copyBadge.classList.remove('hidden');
          if (coordsText) coordsText.classList.add('hidden');

          showLocationToast("KOORDINAT TERSALIN", coordsString);

          setTimeout(() => {
            if (copyBadge) copyBadge.classList.add('hidden');
            if (coordsText) coordsText.classList.remove('hidden');
          }, 2500);
        } catch (err) {
          showLocationToast("KOORDINAT", coordsString);
        }
      });
    }

    // 2. Share Location
    const shareBtn = document.getElementById('btn-share-location');
    if (shareBtn) {
      shareBtn.addEventListener('click', async () => {
        if (navigator.share) {
          try {
            await navigator.share({
              title: "Pondok Pesantren Tahfizh Baitul Qur'an Camba",
              text: "Lokasi Kampus Pondok Pesantren Tahfizh Baitul Qur'an Camba, Maros, Sulawesi Selatan",
              url: mapsShareUrl
            });
          } catch (e) {
            // cancelled or unsupported
          }
        } else {
          try {
            await navigator.clipboard.writeText(mapsShareUrl);
            showLocationToast("TAUTAN TERSALIN", "Tautan lokasi Google Maps berhasil disalin ke papan klip.");
          } catch (e) {
            window.open(mapsShareUrl, '_blank');
          }
        }
      });
    }

    // 3. Map View Filter Modes (Standar, Satelit, Malam)
    const modeButtons = document.querySelectorAll('.map-mode-btn');
    const mapFrame = document.getElementById('google-maps-frame');

    modeButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const filterVal = btn.getAttribute('data-filter') || 'none';
        
        // Update active button styling
        modeButtons.forEach(b => {
          b.classList.remove('bg-white', 'text-stone-900', 'shadow-sm', 'font-semibold');
          b.classList.add('text-stone-300', 'font-medium');
        });
        btn.classList.add('bg-white', 'text-stone-900', 'shadow-sm', 'font-semibold');
        btn.classList.remove('text-stone-300', 'font-medium');

        // Apply CSS filter smoothly to iframe
        if (mapFrame) {
          mapFrame.style.filter = filterVal;
        }
      });
    });
  })();
</script>
